<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function SendEmail()
    {

          $details=[
            'title'=>'Mail From admin website',
            'body'=>'This is for testing mail using gmail.'
        ];


        Mail::to("msalrashdan19@eng.just.edu.jo")->send(new TestMail($details));

        return "Email send";
    }
}
