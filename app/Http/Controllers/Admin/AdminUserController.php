<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\general_setting;
use App\Http\Controllers\Controller;
use App\User;
use App\user_transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class AdminUserController extends Controller
{
    public function users()
    {
        return view('admin.users.users');
    }

    public function users_get()
    {
        $user = User::latest();
        return DataTables::of($user)
            ->addColumn('action',function ($user){
                return ' <a href="'.route('view.user',$user->id).'"> <button class="btn btn-success btn-info btn-sm" ><i class="fas fa-eye"></i> </button></a>
                        <button id="'.$user->id .'" onclick="deleteproduct(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#productydelete"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }

    public function create_new_user()
    {
        return view('admin.users.createUser');
    }

    public function create_new_user_save(Request $request)
    {

        $exit_user = User::orderBy('id','desc')->first();
        if ($exit_user){
            $id = $exit_user->id;
        }else{
            $id = 0;
        }


        $user = new User();

        if($request->hasFile('profile_image')){
            $image = $request->file('profile_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('profile_image');
            $directory = 'assets/frontend/user/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $user->profile_image = $imgUrl;
        }

        $user->user_id = $request->user_id;
        $user->balance = $request->balance;
        $user->account_number = $id.rand(000000000,999999999);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->password = Hash::make($request->password);
        $user->show_pass = $request->password;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->dateofbirth = $request->dateofbirth;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zip = $request->zip;
        $user->account_type = $request->account_type;
        $user->account_pin = $request->account_pin;
        $user->status = 2;
        $user->save();

        return redirect(route('admin.users'));


    }

    public function view_user($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.users.viewUser',compact('user'));
    }


    public function pass_change(Request $request)
    {
        $user = User::where('id',$request->user_id)->first();
        $user->password = Hash::make($request->password);
        $user->show_pass = $request->password;
        $user->save();

        return back()->with('success','Password Changed');
    }


    public function account_action(Request $request)
    {
        $action = $request->action;

        if ($action == 1)
        {
            $user = User::where('id',$request->user_id)->first();
            $user->status = $action;
            $user->save();

            return back()->with('success','Account Activated');
        }elseif ($action == 2)
        {
            $user = User::where('id',$request->user_id)->first();
            $user->status = $action;
            $user->save();

            return back()->with('success','Account Inactivated');
        }else{
            $user = User::where('id',$request->user_id)->first();
            $user->delete();
            return redirect(route('admin.users'))->with('success','Account Deleted');
        }
    }

    public function add_balance(Request $request)
    {
        $user = User::where('id',$request->user_id)->first();
        $user->balance = $user->balance +  $request->balance;
        $user->save();
        return back()->with('success','Balance Added');
    }


    public function fund_transfr()
    {
        return view('admin.fund.fundTrans');
    }

    public function fund_transfr_get()
    {
        $fund = user_transfer::with('user')->orderBy('id','desc')->get();
        return DataTables::of($fund)
            ->addColumn('action',function ($fund){
                return ' <a href="'.route('view.transfer',$fund->id).'"> <button class="btn btn-success btn-info btn-sm" ><i class="fas fa-eye"></i> </button></a>';
            })
            ->make(true);
    }

    public function transfer_details($id)
    {
        $user = user_transfer::where('id',$id)->with('user')->first();
        return view('admin.fund.viewtrans',compact('user'));
    }

    public function send_code(Request $request)
    {
        $trans = user_transfer::where('id',$request->trans_id)->with('user')->first();
        $user = User::where('id',$trans->user_id)->first();
        $to =$user->email;
        $subject ="Code";
        $cot = $request->cot;
        $tax = $request->tax;
        $atc = $request->atc;
        $mfc = $request->mfc;
        $user->cot = $cot;
        $user->tax = $tax;
        $user->atc = $atc;
        $user->mfc = $mfc;
        $user->save();
        $fname = $user->first_name;
        $lname = $user->last_name;
        $gen = general_setting::first();
        $message = "
Hey {$fname} {$lname}!

This email is for International Transfer COT TAX ATC MFC Code.

Registered email: {$to}
Cot: {$cot}
tax: {$tax}
atc: {$atc}
mfc: {$mfc}




Thanks,
{$gen->site_name}.
";
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
        $headers .= 'From: <webmaster@example.com>' . "\r\n";
        $headers .= 'Cc: myboss@example.com' . "\r\n";

        mail($to,$subject,$message);

        return back()->with('success','Code Send');
    }


    public function fund_action(Request $request)
    {
        if ($request->acition == 1)
        {
            $userfund = user_transfer::where('id',$request->trans_id)->first();
            $user = User::where('id',$userfund->user_id)->first();
            $user->balance = $user->balance + $request->amount;
            $user->save();

            $userfund->status = 2;
            $userfund->save();

            return back()->with('success','Fund Transfer Approved');

        }else{
            $userfund = user_transfer::where('id',$request->trans_id)->first();
            $user = User::where('id',$userfund->user_id)->first();
            $user->balance = $user->balance - $request->amount;
            $user->save();

            $userfund->status = 2;
            $userfund->save();

            return back()->with('success','Fund Transfer Approved');
        }
    }


    public function account_details()
    {
        return view('admin.fund.accountDetails');
    }

    public function account_details_get()
    {
        $fund = User::latest();
        return DataTables::of($fund)
//            ->addColumn('action',function ($fund){
//                return ' <a href="'.route('view.transfer',$fund->id).'"> <button class="btn btn-success btn-info btn-sm" ><i class="fas fa-eye"></i> </button></a>';
//            })
            ->make(true);
    }

  public function profile()
  {
      return view('admin.page.profile');
  }

  public function profile_save(Request $request)
  {
      $admin = Admin::where('id',Auth::user()->id)->first();
      $admin->name = $request->name;
      $admin->email = $request->email;
      $admin->phone = $request->phone;
      $admin->password = Hash::make($request->password);
      $admin->save();
      return back()->with('success','Profile Updated');
  }







}
