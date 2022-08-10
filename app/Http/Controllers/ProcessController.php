<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\employee;
use App\Models\process;
use App\Models\shipment_process;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id=$request->id;
        //save the shipment type value in variable shipment type
        $shipment_type=$request->shipment_type;

        $company_id=$request->company_id;
       //Land بري
        if($shipment_type==1)
        {
                 $process=process::where('shipment_type_id',$shipment_type)->get();
        }
        //ٍSea بحري
        else if($shipment_type==3)
        {
              $process=process::where('shipment_type_id',$shipment_type)->get();
        }
        //air جوي
        else if($shipment_type==5)
        {
              $process=process::where('shipment_type_id',$shipment_type)->get(); 
        }
        

        //return employee related to this company
           $employee=employee::with('company')->where('translation_lang','ar')->where('company_id',$company_id)->get();
          
      
       
     return view('Process.index',compact('id','employee','process','shipment_type'));
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         return $request;

         shipment_process::insert();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
         
       
      

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
