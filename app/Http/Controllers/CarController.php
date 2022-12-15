<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // get the relation has one through
    public function getCar()
    {
        //old relation withour has one throgh
       // return Mechanic::find(1)->car->owner;

       //new and update relationship using has one through
        return Mechanic::find(1)->owner;

    }

    //return data from one through relation
    public function getMechanics()
    {
         $mechanics=Mechanic::whereDoesntHave('owner',function($query){
            $query->whereNotNull('phone');
         })->get()->load(['owner']);
        return view('Mechanics',compact('mechanics'));

    }
}
