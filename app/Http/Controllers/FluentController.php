<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FluentController extends Controller
{
    public function index()
    {
        echo '<h1>Fluent Strings</h1>';

        $slice=Str::of('Welcome to my YouTube Channel')->after('Welcome to');

        echo $slice.'<br>';

        $slice2=Str::of('App\Http\Controllers\Controller')->afterLast('\\');
        echo "after last string= ".$slice2.'<br>';

        $stringAppend=Str::of('Hello')->append('World');
        echo $stringAppend.'<br>';

        $LowerCase=Str::of('WELCOME TO  JORDAN')->lower();
        echo $LowerCase;

    }

    public function replaceString()
    {
        $replace=Str::of('Laravel 7.0')->replace('7.0','9.0');
        echo $replace.'<br>';

        $converted=Str::of('this is a title')->title();
        echo $converted.'<br>';

        $slug=Str::of('Laravel 9 Framework')->slug('-');
        echo $slug.'<br>';

        $SubString=Str::of('Laravel Framework')->substr(8,5);
        echo 'SubString='.$SubString.'<br>';

        $trim=Str::of('/Laravel 9/')->trim('/');
        echo $trim.'<br>';

        $upper=Str::of('welcome to upper laravel')->upper();
        echo $upper;
    }
}
