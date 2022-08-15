<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\employee;
use App\Models\process;
use App\Models\shipment_process;
use Exception;
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
          $process="";
        $company_id=$request->company_id;
       //Land بري
        if($shipment_type==1)
        {
            
            $process=process::where('shipment_type_id',$shipment_type)->get();
        }
        //ٍSea بحري
        if($shipment_type==3)
        {
              $process=process::where('shipment_type_id',$shipment_type)->get();
        }
        //air جوي
        if($shipment_type==5)
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
     

        //جوي
        if($request->shipment_type_id==5)
        {
           // return $request;
             
            //print process
            $p1=substr($_POST['process'][0],8,2)."<br>";
            $p2=substr($_POST['process'][1],8,2)."<br>";
            $p3=substr($_POST['process'][2],8,2)."<br>";
            $p4=substr($_POST['process'][3],8,2)."<br>";
            $p5=substr($_POST['process'][4],8,2)."<br>";
            $p6=substr($_POST['process'][5],8,2)."<br>";


            //print employee
             $emp1=substr($_POST['process'][0],12,2)."<br>";
             $emp2=substr($_POST['process'][0],12,2)."<br>";
             $emp3=substr($_POST['process'][0],12,2)."<br>";
             $emp4=substr($_POST['process'][0],12,2)."<br>";
             $emp5=substr($_POST['process'][0],12,2)."<br>";
             $emp6=substr($_POST['process'][0],12,2)."<br>";
   
          /*   for($i=1;$i=6;$i++)
            {
                shipment_process::insert([
                    'process_id'=>,
                    'shipment_type_id'=>$request->shipment_type_id,
                    'shipment_id'=>$request->shipment_id,
                    'employee_id'=>
                    'status'=>
                ]);
            }*/
             
            
        }
        

        //بري
        if($request->shipment_type_id==1)
        {
           print_r($_POST['process']);

            echo substr($_POST['process'][0],11,2)."<br>";
            echo substr($_POST['process'][1],11,2)."<br>";
            echo substr($_POST['process'][2],11,2)."<br>";
            echo substr($_POST['process'][3],11,2)."<br>";
            echo substr($_POST['process'][4],11,2)."<br>";

        }

        //بحري
        if($request->shipment_type_id==3)
        {
           
            echo substr($_POST['process'][0],11,2)."<br>";
            echo substr($_POST['process'][1],11,2)."<br>";
            echo substr($_POST['process'][2],11,2)."<br>";
            echo substr($_POST['process'][3],11,2)."<br>";
            echo substr($_POST['process'][4],8,2)."<br>";
        }

        
        

 
          try
        {
            foreach($request as $key=>$value)
            {
                /* echo $value;
                
                   echo "<br>shipment_id=".$request->shipment_id.
                "<br>shipment_type_id=".$request->shipment_type_id.
                "<br> procees_id=".$value[8].
                "<br>employee_id=".$value[12].$value[13]."<br>"; */
               $request;
                shipment_process::create([
                "process_id"=>$request->process[0][0],
                "shipment_type_id"=>$request->shipment_type_id,
                "shipment_id"=>$request->shipment_id,
                "employee_id"=>$value[12].$value[13],
                "status"=>0
                ]); 
                
                
                

            }
            return redirect()->route('shipments.index')->with('success','process assigned successfully');
        }
        catch(Exception $ex)
        {
           return redirect()->route('process.index')->with('error','حدث خطا ما يرجى محاولة لاحقا');

        }
       
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
