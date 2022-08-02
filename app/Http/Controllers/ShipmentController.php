<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShipmentRequest;
use App\Models\Company;
use App\Models\shipment;
use App\Models\shipment_image;
use App\Models\shipment_type;
use App\Models\User;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shipments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $users=User::Select('id','name')->where('id','!=',1)->get();
              $companies=Company::Select('id','name')->Active()->get();
              $shipment_type=shipment_type::Select('id','name')->where('translation_of',0)->get();
       return view('shipments.create',compact('users','companies','shipment_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShipmentRequest $request)
    {
     
      /*       
        $files=[];
        if($request->hasFile('images'))
        {
            foreach($request->file('images') as $file)
            {
                $name=time().'.'.$file->extension();
                $file->move(public_path('shipments'),$name);
                $files[]=$name;

            }
            $file=new shipment_image();
            $file->image=$files;
            $file->save();

        } */
        shipment::create([
            'number'=>$request->shipment_number,
            'user_id'=>$request->user,
            'company_id'=>$request->company,
            'shipment_type_id'=>$request->shipment_type,
            'note'=>$request->note

        ]);
        
         return redirect()->route('shipments.index')->with('success','shipment created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function show(shipment $shipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function edit(shipment $shipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, shipment $shipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(shipment $shipment)
    {
        //
    }
}
