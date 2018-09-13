<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use messages;


class LoginController extends Controller
{
   
   

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(){
        $credenciales = $this->validate(request(),[
            'email' => 'email|required',
            'password' => 'required'
        ]);

       if(Auth::attempt($credenciales)){
            return redirect()->route('messages.index');
           
       }

       return view('auth.login');
    }


    public function logout(){

        Auth::logout();

      
        return redirect('/')->with('Gracias por confiar en nosotros');

    }
   

    

}
