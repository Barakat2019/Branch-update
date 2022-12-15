<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function addRole()
    {
        $roles=[
            ["name"=>"Administrator"],
            ["name"=>"Editor"],
            ["name"=>"Author"],
            ["name"=>"Contributor"],
            ["name"=>"Subscribers"]

        ];


        Role::insert($roles);
        return "Role are created successfully";
    }

    public function addUser()
    {
         $user=new User();

            $user->name="ahmad";
            $user->email="ahmad.kamal@ymail.com";
            $user->password=bcrypt('secret');

        $user->save();

         $roleids=[1,2,3];
         //save data in pivot table using attach
        // $user->roles()->attach([4=>['expires_at'=>now()->addyear()]])

        //use sync metho
        /*
        $user->roles()->sync([
            1=>[
                'expires_at'=>now()->addMonths(6)
            ]
        ])
        */
        //add data to pivot table without remove the old data
        $user->roles()->syncWithoutDetaching([2=>['expires_at'=>now()->addyear()]]);

        $user->roles()->attach($roleids);
        User::has('roles')->get();//return the user has roles
        User::doesntHave('roles')->get();//return the user doesn't have role
        User::whereHas('roles',function($query){
            $query->where('name','Editor');
        })->get();



        return "Record has been created successfully";
    }

    //Return all user doesn't have role editor
    public function GetAllNoRoles()
    {

        return User::WhereDoesntHave('roles',function($query){
            $query->where('name','Editor');
        })->get();
    }

    public function getAllRolesByUser($id)
    {
        $user=User::find($id);
        return $user->roles->makeHidden(['profile_photo_url','profile_photo_path','current_team_id','two_factor_confirmed_at','email_verified_at','created_at','updated_at']);
    }

    public function getAllUsersByRole($id)
    {
        $role=Role::find($id);

        return $role->users->makeHidden(['profile_photo_url','profile_photo_path','current_team_id','two_factor_confirmed_at','email_verified_at','created_at','updated_at']);
    }
}
