<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $fillable=['name','phone','email','active','company_id'];

   // scope local to return the selected column rather thn all column
     public function scopeSelection($query)
     {
       return $query->select('id','translation_lang','name','phone','email','company_id','active');
     }

    
     

    //inverse relation many employee related to one company
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

    public function scopeActive($query)
    {
        return $query->where('active',1);
    }

    //return the active name rather than 1 or 2 in view 
    public function getActive()
    {
        //to don't retrieve 1 or 2 when retrieve active value
        return $this->active==1?'مفعل':'غير مفعل';
    }

    //self relation to return the translation language from same model
    //self::class ->relation with same model

    public function trans_employee()
    {
        return $this->hasMany(self::class,'translation_of');

    }

}
