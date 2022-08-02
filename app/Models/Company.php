<?php

namespace App\Models;

use App\Observers\CompanyObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable=['id','translation_lang','translation_of','name','website','location','active','created_at','updated_at'];

    /* Connect the model with observer, to change the active for employee auto
    when change the active in company
    */
    protected static function boot()
    {
        parent::boot();
        Company::observe(CompanyObserver::class);

    }


    // scope local to return the selected column rather thn all column
    public function scopeSelection($query)
    {
        return $query->select('id','translation_lang','name','website','location','active','created_at','updated_at');
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

    public function trans_company()
    {
        return $this->hasMany(self::class,'translation_of');

    }

    //relation between company and employee ,one to many every company have more than one employee
    public function employee()
    {
        return $this->hasMany(employee::class,'company_id');
    }


}
