<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;

    protected $fillable=['name','email','phone','profileimage'];

    public static function getStudent()
    {
        $reports=DB::table('students')->select('id','name','email','phone','created_at','updated_at')->get()->toArray();

        return $reports;
    }

    public function getProfileimageAttribute($value)
    {
        return ($value!==null)?asset('image/'.$value):'';
    }

}
