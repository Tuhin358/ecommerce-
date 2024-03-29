<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function index(){
        return view('admin.admin_login');
    }




    public function show_dashboard(Request $request){
        $admin_email = $request->email;
        $admin_password =md5($request->password);
        $result = Admin::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($result){
            Session::put('admin_id',$result->admin_id);
            Session::put('admin_name',$result->admin_name);
            // return Redirect::put('dashboard');
            return redirect()->route('dashboard');
        }else{
            Session::put('message', 'Email and Password Invalid');
            return redirect()->route('login.index');
        }

    }


}
