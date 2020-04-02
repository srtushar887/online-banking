<?php

namespace App\Http\Controllers;

use App\general_setting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function about_us()
    {
        return view('frontend.aboutus');
    }

    public function contact_us()
    {
        return view('frontend.conatctus');
    }

    public function contact_use_send(Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
           'email' => 'required',
           'phone_number' => 'required',
           'msg_subject' => 'required',
           'message' => 'required',
        ],[
            'name.required' => "Please Enter Your Name",
            'email.required' => "Please Enter Your Email",
            'phone_number.required' => "Please Enter Your Phone",
            'msg_subject.required' => "Please Enter Subject",
            'message.required' => "Please Enter Your Message",
        ]);

        $gen = general_setting::first();
        $to = $gen->site_email;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone_number;
        $subject = $request->msg_subject;
        $mess = $request->message;
        $time = Carbon::now('Asia/Dhaka')->format('Y/m/d H:i:s');
        $message = "

This Message Come Form {$time}.

Name : {$name}

Email : {$email}

Phone : {$phone}

Subject : {$subject}

Message : {$mess}


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



        return back()->with('success','Message Send Successfully');


    }

    public function faq(){
        return view('frontend.faq');
    }

    public function privacy()
    {
        return view('frontend.pivacy');
    }
}
