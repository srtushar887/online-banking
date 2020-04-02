<?php

namespace App\Http\Controllers\User;

use App\general_setting;
use App\Http\Controllers\Controller;
use App\Mail\FeedbackMail;
use App\User;
use App\user_transfer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function local_transfer()
    {
        return view('user.localTransfer');
    }

    public function local_transfer_save(Request $request)
    {

        $this->validate($request,[
            'amount' => 'required',
            'reciver_account_number' => 'required',
            'receiver_name' => 'required',
            'sender_account_nubmber' => 'required',
            'description' => 'required',
        ],[
            'amount.required' => "Enter Amount",
            'reciver_account_number.required' => "Enter Receiver Account Number",
            'receiver_name.required' => "Enter Receiver Name",
            'sender_account_nubmber.required' => "Enter Sender Account Number",
            'description.required' => "Enter Description",
        ]);

        if (Auth::user()->balance < $request->amount  ){
            return back()->with('alert','Insufficient Balance');
        }else{
            $new_trans = new user_transfer();
            $new_trans->user_id = Auth::user()->id;
            $new_trans->amount = $request->amount;
            $new_trans->reciver_account_number = $request->reciver_account_number;
            $new_trans->receiver_name = $request->receiver_name;
            $new_trans->sender_account_nubmber = $request->sender_account_nubmber;
            $new_trans->transfer_date = Carbon::now('Asia/Dhaka')->format('Y-m-d');
            $new_trans->description = $request->description;
            $new_trans->transfer_type = 1;
            $new_trans->status = 1;
            $new_trans->debit_or_credit = 1;
            $new_trans->ref_no = Auth::user()->id.rand(00000,99999);
            $new_trans->save();

            return back()->with('success','Local Transfer Successfull');
        }

    }

    public function international_transfer()
    {
        return view('user.internatonalTransfer');
    }

    public function international_transfer_save(Request $request)
    {
        $this->validate($request,[
            'receiver_bank_name' => 'required',
            'reciver_account_number' => 'required',
            'receiver_name' => 'required',
            'swift_code' => 'required',
            'country' => 'required',
            'amount' => 'required',
            'description' => 'required',
        ],[
            'receiver_bank_name.required' => "Enter Bank Name",
            'reciver_account_number.required' => "Enter Receiver Account Number",
            'receiver_name.required' => "Enter Receiver Name",
            'swift_code.required' => "Enter Swift Code",
            'country.required' => "Enter Country",
            'amount.required' => "Enter Amount",
            'description.required' => "Enter Description",
        ]);


        if (Auth::user()->balance < $request->amount  ){
            return back()->with('alert','Insufficient Balance');
        }else {
//            $new_in_trans = new user_transfer();
            $new_in_trans['user_id'] = Auth::user()->id;
            $new_in_trans['receiver_bank_name'] = $request->receiver_bank_name;
            $new_in_trans['reciver_account_number'] = $request->reciver_account_number;
            $new_in_trans['receiver_name'] = $request->receiver_name;
            $new_in_trans['swift_code'] = $request->swift_code;
            $new_in_trans['country'] = $request->country;
            $new_in_trans['amount'] = $request->amount;
            $new_in_trans['sender_account_nubmber'] = Auth::user()->account_number;
            $new_in_trans['transfer_date'] = Carbon::now()->format('Y-m-d');
            $new_in_trans['description'] = $request->description;
            $new_in_trans['transfer_type'] = 2;
            $new_in_trans['status'] = 0;
//            $new_in_trans->save();

            Session::push('data',$new_in_trans);

            $gen = general_setting::first();
            $user = User::where('id', Auth::user()->id)->first();
            $to = $user->email;
            $to_name = $user->first_name;
            $to_email = $user->email;
            $subject = "Transfer Code";
            $code = $user->id . rand(00000, 99999);
            $user->first_code = $code;
            $user->save();
            $fname = $user->first_name;
            $lname = $user->last_name;
            $message = "
Dear {$fname} {$lname}!

This email is for International Verification Code.

Registered email: {$to}
CODE: {$code}




Thanks,
{$gen->site_name}.
";
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
            $headers .= 'From: <webmaster@example.com>' . "\r\n";
            $headers .= 'Cc: myboss@example.com' . "\r\n";

            mail($to, $subject, $message);

            return redirect(route('user.email.first.code'));
        }
    }

    public function enter_code()
    {
        return view('user.enterfirstcode');
    }

    public function first_code_check(Request $request)
    {
        $this->validate($request,[
            'firt_code' => 'required',
        ],[
            'firt_code.required' => "Enter Code",
        ]);
        $user = User::where('id',Auth::user()->id)->first();
        if ($user->first_code == $request->firt_code)
        {
            return redirect(route('second.code'));
        }else{
            return back()->with('alert','Code Not Match. Please Try Again');
        }
    }

    public function sencond_code()
    {
        return view('user.entersecondcode');
    }

    public function ctaf_check(Request $request)
    {
        $this->validate($request,[
            'cot' => 'required',
        ],[
            'cot.required' => "Enter COT Code",
        ]);
        $user = User::where('id',Auth::user()->id)->first();
        if ($user->cot == $request->cot){
            return redirect(route('taxcode'));
        }else{
            return back()->with('alert',' COT Code Not Match. Please Try Again');
        }

    }


    public function tax_code()
    {
        return view('user.taxcode');
    }

    public function tax_code_check(Request $request)
    {
        $this->validate($request,[
            'tax' => 'required',
        ],[
            'tax.required' => "Enter TAX Code",
        ]);
        $user = User::where('id',Auth::user()->id)->first();
        if ($user->tax == $request->tax){
            return redirect(route('atccode'));
        }else{
            return back()->with('alert',' TAX Code Not Match. Please Try Again');
        }
    }

    public function atc_code()
    {
        return view('user.atccode');
    }

    public function atc_code_check(Request $request)
    {
        $this->validate($request,[
            'atc' => 'required',
        ],[
            'atc.required' => "Enter ATC Code",
        ]);
        $user = User::where('id',Auth::user()->id)->first();
        if ($user->atc == $request->atc){
            return redirect(route('mfccode'));
        }else{
            return back()->with('alert',' ATC Code Not Match. Please Try Again');
        }
    }

    public function mfc_code()
    {
        return view('user.mfccode');
    }

    public function mfc_code_check(Request $request)
    {
        $this->validate($request,[
            'mfc' => 'required',
        ],[
            'mfc.required' => "Enter MFC Code",
        ]);
        $user = User::where('id',Auth::user()->id)->first();
        if ($user->mfc == $request->mfc){

            $data = Session::get('data');

//            return $data[0]['user_id'];

            $new_in_trans = new user_transfer();
            $new_in_trans['user_id'] = Auth::user()->id;
            $new_in_trans['receiver_bank_name'] = $data[0]['receiver_bank_name'];
            $new_in_trans['reciver_account_number'] = $data[0]['reciver_account_number'];
            $new_in_trans['receiver_name'] = $data[0]['receiver_name'];
            $new_in_trans['swift_code'] = $data[0]['swift_code'];
            $new_in_trans['country'] = $data[0]['country'];
            $new_in_trans['amount'] = $data[0]['amount'];
            $new_in_trans['sender_account_nubmber'] = Auth::user()->account_number;
            $new_in_trans['transfer_date'] = Carbon::now('Asia/Dhaka')->format('Y-m-d');
            $new_in_trans['description'] = $data[0]['description'];
            $new_in_trans['transfer_type'] = 2;
            $new_in_trans['status'] = 1;
            $new_in_trans['debit_or_credit'] = 1;
            $new_in_trans->save();


            return redirect(route('user.international.transfer'))->with('success','International Transfer Successfull');
        }else{
            return back()->with('alert',' MFC Code Not Match. Please Try Again');
        }
    }



    public function transaction_history(Request $request)
    {
        $data = $request->form;
        $data2 = $request->to;

        $user = user_transfer::where('user_id',Auth::user()->id)
            ->whereBetween('created_at', [$data, $data2])
            ->get();
        return view('user.trnsantionhistory',compact('user'));
    }


    public function check_summery(Request $request)
    {
        $data = $request->form;
        $data2 = $request->to;

        $user = user_transfer::where('user_id',Auth::user()->id)
            ->whereBetween('transfer_date', [$data, $data2])
            ->get();

        return view('user.trnsantionhistory',compact('user'));
    }

    public function credit_card()
    {
        return view('user.creditcard');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function profile_update(Request $request)
    {
        $user = User::where('id',Auth::user()->id)->first();
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zip = $request->zip;
        $user->save();

        return back()->with('success','Profile Updated');
    }

    public function change_pin()
    {
        return view('user.changePin');
    }

    public function change_pin_save(Request $request)
    {

        $this->validate($request,[
            'old_pin' => 'required',
            'new_pin' => 'required',
            'c_new_pin' => 'required',
        ],[
            'old_pin.required' => 'Enter Current Pin',
            'new_pin.required' => 'Enter New Pin',
            'c_new_pin.required' => 'Enter Confirm Pin',
        ]);

        if ($request->old_pin != Auth::user()->account_pin)
        {
            return back()->with('alert','Currend Pin Not Match.');
        }elseif ($request->new_pin != $request->c_new_pin ){
            return back()->with('alert','New Account Pin And Confirm New Account Pin Not Match.');
        }else{
            $user = User::where('id',Auth::user()->id)->first();
            $user->account_pin = $request->new_pin;
            $user->save();
            return back()->with('success','Account Pin Change Successfull.');
        }
    }

    public function change_password()
    {
        return view('user.changePassword');
    }

    public function change_password_save(Request $request)
    {
        $this->validate($request,[
            'new_pin' => 'required',
            'c_new_pin' => 'required',
        ],[
            'new_pin.required' => 'Enter New Password',
            'c_new_pin.required' => 'Enter Confirm Password',
        ]);

        if ($request->new_pin != $request->c_new_pin )
        {
            return back()->with('alert','Password Not Match.');
        }else{
            $user = User::where('id',Auth::user()->id)->first();
            $user->password = Hash::make($request->new_pin);
            $user->show_pass = $request->new_pin;
            $user->save();
            return back()->with('success','Password Change Successfull.');
        }
    }
}
