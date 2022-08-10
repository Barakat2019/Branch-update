<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Company;
use App\Models\shipment;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $clients=User::where('id','!=',1)->Paginate(5);

        return view('admin.client.index',compact('clients'));   
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $shipment_number=shipment::pluck('number');
          //company variable definde in AppServer Provider to share all views 
        return view('admin.client.create',compact('shipment_number'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
       
         User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone'=>$request->phone,
            'age'=>$request->age,
            'address'=>$request->address,
            'shipment_id'=>$request->shipment_id,
            'is_admin'=>0
        ]); 
        return redirect()->route('clients.index')->with('success','client added successfully');
   
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
             
              $clients=User::Selection()->find($id);
             
           if(!$clients)
            {
                return redirect()->route('clients.index')->with('error','هذا العميل غير موجود أو ربما تكون محذوفة');
            }
            return view('admin.client.edit',compact('clients'));



        }
        catch(Exception $ex)
        {
            return redirect()->route('clients.index')->with('error','حدث خطأ ما يرجى المحاولة لاحقا');
        }
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
       
        try
        {
             $client=User::Selection()->find($id);
            if(!$client)
            {
                return redirect()->route('clients.index')->with('error','هذا العميل غير موجود أو ربما تكون محذوف');
            }

            
             User::where('id',$id)->update([
                'shipment_id'=>$request->shipment_id,
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'age'=>$request->age,
                'address'=>$request->address
            ]);
 
            return redirect()->route('clients.index')->with('success','تم تحديث معلومات عميل بنجاح');



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

            $Clients=User::find($id);
            if(!$Clients)
            {
                return redirect()->route('clients.index')->with('error','هذا العميل غير موجود أو ربما يكون محذوفا');

            }
          $Clients->delete();
          




          return redirect()->route('clients.index')->with('success','تم حدف العميل بنجاح');


      } catch (Exception $ex)
      {
        
          return redirect()->route('clients.index')->with('error','حدث خطأ ما يرجى محاولة لاحقا');
      }
    }
}
