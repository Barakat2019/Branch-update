<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserControllerRequest;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{

    public function index(Request $request)
    {
        //access the request method
        //return $request->method();

        //return $request->path();

        return $request->fullUrl();
    }

    public function getLoginForm()
    {
        return view('login');
    }

    public function loginSubmit(UserControllerRequest $request)
    {


        $email=$request->input('email');
        $password=$request->input('password');
        $request->session()->put('email',$email);
        return $email;


    }

    //Use Pagination in this method
    public function allUsers($locale)
    {
        App::setLocale($locale);

        $users=User::get()->load(['roles'=>function($query){
            $query->wherePivot('expires_at','>',now());
        }]);
        $isActive=true;
        $hasError=true;
        $product=['A','B','C','D','E','F','G','H','I','J'];

        return view('contact',compact('users','isActive','hasError','product'));
    }

    public function getUploadPage()
    {

        //page already created ,for upload file
        return view('about');
    }

    public function uploadFile(Request $request)
    {

         //default value of file path
         $file_path="";

         if($request->has('file'))
         {
             $filename=$request->file('file')->getClientOriginalName();
            $request->file->move('image',$filename);
         }

        return "File  upload";
    }

    //Add record to user table with phone Relation
    public function insertRecord()
    {
        #Add Phone to Table Phone
        $phone=new Phone();
        $phone->phone="0795745814";

        #Add use to table users
        $user=new User();
         $user->name="barakat";
         $user->email="barakatalrashdan@gmail.com";

        $user->password=bcrypt('admin');

        $user->save();
        //save phone related to user
        $user->phone_user()->save($phone);


        return 'record has been created successfully';

    }

    public function fetchPhoneByUser()
    {
        //Has one relation
         //$phone=User::find($id)->phone_user;
         //dd(Phone::find($id)->user);

         //eager loadind
          $users=User::with(['phone_user'])->get();


         //lazy loading
         $users=User::get()->load(['phone_user']);

        // return view('contact',compact('users'));

         //Existance use has method
          User::has('phone_user')->get();

         //return user doesn't have profile
          User::doesntHave('phone_user')->get();

         //return user has phone
          User::WhereHas('phone_user',function($q){
            $q->whereNotNull('phone');
         })->get();

          //return user has no phone
            User::WhereHas('phone_user',function($q){
            $q->whereNull('phone');
         })->get();


         //save data using relation has one
         $user=User::find(7);
         return $user->phone_user()->create(['phone'=>'0788286818']);


    }

    public function updatePhoneUser($id)
    {

        $user=User::find($id);
        $user->phone_user()->update([
            'phone'=>'11115555'
        ]);
    }
    public function deletePhoneByUser($id)
    {
        $user=User::find($id);
        $user->phone_user()->delete();
        return 'phone related to this user has been deleted';
    }
}
