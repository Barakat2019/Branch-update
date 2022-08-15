<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        $is_admin=$request->is_admin;
      
       
        if($is_admin==1)
        {
           
              $user=User::where('email',$email)->where('password',Hash::check('password',$password))->where('is_admin',$is_admin)->get();
               return redirect()->route('company.index')->with('user',$user);

        }
        else 
        if($is_admin==2)
        {
            return $request;
            
            $user=User::where('email',$email)->where('password',Hash::check('password',$password))->where('is_admin',$is_admin)->get();
            return "you are employee";
        }
        
    }
}
