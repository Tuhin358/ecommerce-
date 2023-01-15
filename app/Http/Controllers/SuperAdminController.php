<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SuperAdminController extends Controller
{
    public function dashboard(){
        $this->AdminAuthCheck();
        return view('admin.dashboard');
    }

    public function logout(){
        Session::flush();
        return redirect()->route('login.index');
    }

    public function AdminAuthCheck(){
        $admin_id = Session::get('admin_id');
        if( $admin_id){
            return;

        }else{
            return redirect()->route('login.index')->send();
        }


    }
}
