<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $result = Customer::where('email', $email)->where('password', $password)->first();
        if($result){
            Session::put('id', $result->id);
            return redirect()->route('checkout');
        }else{
            return redirect()->route('login.checkout');
        }


    }

    public function registration(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['mobile'] = $request->mobile;
        $id=Customer::insertGetId($data);
        Session::put('id', $id);
        Session::put('name', $request->name);
        return redirect()->back();

    }
    public function logout(){
        Session::flush();
        return redirect()->route('frond.index');
    }
}
