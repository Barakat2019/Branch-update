<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WelcomeContoller extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');

    }
    public function index($name=null)
    {
        return 'Hi From WelcomeController.<br>My name is'.$name;
    }

    public function fruits()
    {
        Session::put('acitveNav','home');
        $fruites=array('Mango','Organge','Banana','Apple','Pineapple');
        return view('welcome',compact('fruites'));
    }

    //Access the Session Data
    public function getSessionData(Request $request)
    {
        if($request->session()->has('email'))
        {
            echo $request->session()->get('email')."<br>";
            print_r($request->session()->get('user.teams'));
        }
        else
        {
            echo 'No Data in the session';
        }
    }

    //save session
    public function storeSessionData(Request $request)
    {
        $request->session()->put('name','Barakat');
        $request->session()->push('user.teams','developers');
        $request->session()->push('user.teams','developer 1');


        // $request->session()->pull('user.teams','developers');
        echo "data has been added to the sesssion";
    }

    //remove session by key name
    Public function deleteSessionData(Request $request)
    {
         $request->session()->forget('name');
         echo "data has been deleted to the sesssion";
    }
}
