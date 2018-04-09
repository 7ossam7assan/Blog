<?php

namespace App\Http\Controllers\Admins;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{ 
  public function showlogin()
    {
      $this->middleware('guest:admin')->except('logout');
        return view('admins.login');
        
    }
    public function login() {
        $rememberme= request('rememberme')==1?true:false;
        if(auth()->guard('admin')->attempt(['email'=> request('email'),'password'=> request('password')],$rememberme)){
           return redirect('/admin') ;
        }
        else {
            return redirect(route('loginadmin'));
        }
    }
    public function logout() {
        auth()->guard('admin')->logout();
        return redirect(route('loginadmin'));
    }
}
