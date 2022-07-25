<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $fillable=['name','phone','email','company_id'];

   // scope local to return the selected column rather thn all column
     public function scopeSelection($query)
     {
       return $query->select('id','name','phone','email','company_id','active');
    }

    //inverse relation many employee related to one company
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }
}
