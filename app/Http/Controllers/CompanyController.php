<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\employee;
use DateTime;
use Yajra\DataTables\DataTables;
use Exception;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $companies = Company::get();
        return view('admin.company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $website="https://wwww.".$request->website;
         Company::insert([
            'name'=>$request->name,
            'website'=>$website,
            'location'=>$request->location,
            'active'=>0
        ]); 
        return redirect()->route('company.index')->with('success','company created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        try
        {
            $company=Company::Selection()->find($id);

            if(!$company)
            {
                return redirect()->route('company.index')->with('error','هذه الشركة غير موجودة أو ربما تكون محذوفة');
            }
            return view('admin.company.edit',compact('company'));
        }
        catch(Exception $ex)
        {
            return redirect()->route('company.index')->with('error','حدث خطأ ما يرجى المحاولة لاحقا');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
     
        try
        {
             $company=Company::Selection()->find($id);
            if(!$company)
            {
                return redirect()->route('company.index')->with('error','هذه الشركة غير موجودة أو ربما تكون محذوفة');
            }

            Company::where('id',$id)->update($request->except('_token','_method'));

            return redirect()->route('company.index')->with('success','تم تحديث معلومات الشركة بنجاح');



        }
        catch(Exception $ex)
        {
            return redirect()->route('company.index')->with('error','حدث خطأ ما يرجى محاولة لاحقا');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try 
        {

            $Companys=Company::find($id);
            if(!$Companys)
            {
                return redirect()->route('company.index')->with('error','هذه الشركة غير موجودة');

            }
          $Companys->delete();



          return redirect()->route('company.index')->with('success','تم حدف الشركة بنجاح');


      } catch (Exception $ex)
      {

          //return $ex;
          //throw $th;
          //DB::rollBack(); No need rollback because there is no more than one transaction in DB

          return redirect()->route('vendors.index')->with('error','حدث خطأ ما برجاء المحاولة لاحقا');
      }
    }

    public function ChangeStatus($id)
    {
        try
        {
            $company=Company::find($id);

            if(!$company)
                return redirect()->route('company.index')->with('error','هذه الشركة غير موجودة');

                //check if status is not active will become active else will become not active

                 $active=$company->active==0?1:0;

                 //update the active column in Vendors Table
                 $company->update(['active'=>$active]);

                 return redirect()->route('company.index')->with('success','تم تغيير حالة الشركة بنجاح');

        }
        catch(Exception $ex)
        {
            return redirect()->route('company.index')->with('error','حدث خطأ ما برجاء المحاولة لاحقا');
        }
    }


}
