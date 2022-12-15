<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students=Student::orderBy('id','desc')->get();
        return view('Ajax.students',compact('students'));

    }

    public function AddStudent(Request $request)
    {
         Student::create($request->all());

         return json_encode(array("statusCode"=>200));

           
        
        
    }


}
