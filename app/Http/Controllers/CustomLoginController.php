<?php

namespace App\Http\Controllers;

use App\general_setting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomLoginController extends Controller
{
    public function login(Request $request)
    {

        $this->validate($request,[
           'user_id' => 'required',
           'password' => 'required',
        ],[
            'user_id.required' => 'Please Enter User ID',
            'password.required' => 'Please Enter Password',
        ]);

        if(Auth::guard('web')->attempt(['user_id'=>$request->user_id,'password'=>$request->password],$request->remember)){

                return redirect(route('verifypin'));

        }
        else{
            return back()->with('alert','User Id or Password was Incorrect');
        }
    }

    public function verify_pin()
    {
        $user = User::where('id',Auth::user()->id)->first();
        $user->new_login = 1;
        $user->save();

        return view('user.verifyPin');
    }

    public function verify_pin_code(Request $request)
    {
        $pin = $request->pin;
        $user = User::where('account_pin',$pin)->first();

        if ($user){
            $user->new_login = 2;
            $user->save();


            $gen = general_setting::first();
            $user = User::where('id', Auth::user()->id)->first();
            $to = $user->email;
            $subject = "Login Notification Mail";
            $fname = $user->first_name;
            $lname = $user->last_name;
            $time = Carbon::now('Asia/Dhaka')->format('Y/m/d H:i:s');
            $message = "
Dear {$fname} {$lname}!

You successfully logged into your CbmBank profile on {$time}.

If you did not initiate this login, please call our 24 hour contact center immediately
on +{$gen->site_phone} or send an email to Support@cbmbnk.com.

{$gen->site_name} will NEVER send you a link to any external website or request your personal banking details via e-mail, telephone or in person. You are advised to


always keep your log-on details safe and never disclose it to anyone. Thank you for choosing {$gen->site_name}.





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



            return redirect('home');
        }else{
            return back()->with('alert','Incorrect Pin');
        }

    }
}
