<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(){
        return view('admin.app');
    }

    public function login(){
        return view('admin.login');
    }

    public function logout(){
        Session::put('name', null);
        Session::put('id', null);
        return redirect()->route('admin.login');
    }
    
    public function login_check(Request $res){
        $email = $res->email;
        $password = $res->password;

        $result = User::where('email',$email)->where('password',$password)->first();
        if ($result) {
            Session::put('name',$result->name);
            Session::put('id',$result->id);
            return redirect()->route('admin.index');
        }else {return redirect()->route('admin.login');}
    }

}
