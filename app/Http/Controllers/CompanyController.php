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
           $default_lang=get_default_lang();
            $companies=Company::with('employee')->where('translation_lang',$default_lang)->Selection()->paginate(5);

            
          
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
          //convert array of object return from request to collection

            //use collect to make filter in request return from category and see who is the ar langauge
       
        $company=collect($request->company);

        
            /*
            Filter on Arabic langage,first save the default Language in app ,
            return depend on the language in in config>app->locale using method get_default_lang()
            */
        $filter=$company->filter(function($value,$key){
            return $value['translation_lang']==get_default_lang();
         });

          //filter->all() convert object to array
         $default_company=array_values($filter->all())[0];

      $website="https://www.".$request->website;

      //save the first Language arabic
      $default_company_id=Company::insertGetId([
        'translation_lang'=>$default_company['translation_lang'],
        'translation_of'=>0,
        'name'=>$default_company['name'],
        'location'=>$default_company['location'],
        'website'=>$website,
        'active'=>0,
        'created_at' => date("Y-m-d H:i:s", strtotime('now')),
        'updated_at'=>date("Y-m-d H:i:s", strtotime('now'))


    ]);

         //Repeat the same line above for arabic ,language but here return any other Language rather than default
         $company_other_default_lang=$company->filter(function($value,$key){
            return $value['translation_lang']!=get_default_lang();
        });

        //check if the save categories other Languages exist and have data

        if(isset($company_other_default_lang)&&$company_other_default_lang->count())
        {
            //create empty array,we create array and make foreach just for performance
            $company_arr=[];

            foreach($company_other_default_lang as $company)
            {
                $company_arr[]=[
                    'translation_lang'=>$company['translation_lang'],
                    'translation_of'=>$default_company_id,
                    'name'=>$company['name'],
                    'website'=>$website,
                    'location'=>$company['location'],
                    'active'=>0,
                    'created_at' => date("Y-m-d H:i:s", strtotime('now')),
                    'updated_at'=>date("Y-m-d H:i:s", strtotime('now'))
                ];
            }
            //save the another Language
            Company::insert($company_arr);
        }
        return redirect()->route('company.index')->with('success', __('messages.company created successfully'));

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
              $company=Company::with('trans_company')->Selection()->find($id);

             
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

              $first_company=array_values($request->company)[0];
            Company::where('id',$id)->update([
                'name'=>$first_company['name'],
                'location'=>$first_company['location'],
                'website'=>$request->website
            ]);

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
          $Companys->trans_company()->delete();




          return redirect()->route('company.index')->with('success','تم حدف الشركة بنجاح');


      } catch (Exception $ex)
      {
        
          return redirect()->route('company.index')->with('error','لا يمكن حذف هذه الشركة لان لديها موظفين و مرتبطة مع شحنات');
      }
    }

    public function ChangeStatus($id)
    {
        try
        {
            $company=Company::with('trans_company')->find($id);
            

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
            return $ex;
            return redirect()->route('company.index')->with('error','حدث خطأ ما برجاء المحاولة لاحقا');
        }
    }

    //Get employee related to this company one company Employee
    public function getCompanyEmployee($company_id)
    {
             $company=Company::with('employee')->find($company_id);
        
              $employees=$company->employee; 
           
           
       // return $company->employee; //return company doctors
       return view('admin.employee.index',compact('employees'));



    }


}
