<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function flush(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');  
    }
}
