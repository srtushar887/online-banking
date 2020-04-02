<?php

namespace App\Http\Controllers\Admin;

use App\general_setting;
use App\Http\Controllers\Controller;
use App\User;
use App\user_transfer;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        $total_user = User::count();
        $total_local_tarns = user_transfer::where('transfer_type',1)->sum('amount');
        $total_int_tarns = user_transfer::where('transfer_type',2)->sum('amount');
        return view('admin.index',compact('total_user','total_local_tarns','total_int_tarns'));
    }

    public function general_settings()
    {
        $gen = general_setting::first();
        return view('admin.page.generalsettings',compact('gen'));
    }

    public function general_settings_update(Request $request)
    {
        $gen = general_setting::first();
        if($request->hasFile('logo')){
            @unlink($gen->logo);
            $image = $request->file('logo');
            $imageName = time().'.'.$image->getClientOriginalName('logo');
            $directory = 'assets/admin/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->logo = $imgUrl;
        }
        if($request->hasFile('icon')){
            @unlink($gen->icon);
            $image = $request->file('icon');
            $imageName = time().'.'.$image->getClientOriginalName('icon');
            $directory = 'assets/admin/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->icon = $imgUrl;
        }

        $gen->site_name = $request->site_name;
        $gen->site_email = $request->site_email;
        $gen->address = $request->address;
        $gen->site_email = $request->site_email;
        $gen->site_phone = $request->site_phone;
        $gen->swift_code = $request->swift_code;
        $gen->save();

        return back()->with('success','General Settings Updated');
    }
}
