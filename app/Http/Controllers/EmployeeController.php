<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\employee;
use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::Selection()->get();
 
        return view('admin.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $companies=Company::pluck('id','name'); 
        
             return view('admin.employee.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
         employee::create($request->except('_token'));
        return redirect()->route('employee.index')->with('successs','Employee added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $employee=employee::Selection()->find($id);

            if(!$employee)
            {
                return redirect()->route('employee.index')->with('error','هذا الموظف غير موجود أو ربما تكون محذوف');
            }

            return view('admin.employee.edit',compact('employee'));

        }
        catch(Exception $ex)
        {
            return redirect()->route('employee.index')->with('error','حدث خطأ ما يرجى المحاولة لاحقا');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(employee $employee)
    {
        //
    }
    public function ChangeStatus($id)
    {
        try
        {
            $employee=employee::find($id);

            if(!$employee)
                return redirect()->route('employee.index')->with('error','عذرا هذا الموظف غير موجود');

                //check if status is not active will become active else will become not active

                 $active=$employee->active==0?1:0;

                 //update the active column in Vendors Table
                 $employee->update(['active'=>$active]);

                 return redirect()->route('employee.index')->with('success','تم تغيير حالة الشركة بنجاح');

        }
        catch(Exception $ex)
        {
            return redirect()->route('employee.index')->with('error','حدث خطأ ما برجاء المحاولة لاحقا');
        }
    }
}
