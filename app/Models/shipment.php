<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipment extends Model
{
    use HasFactory;
    protected $fillable=['id','number','user_id','company_id','shipment_type_id','note'];

    public function shipment_image()
    {
        return $this->hasMany(shipment_image::class,'shipment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

    public function shipment_type()
    {
        return $this->hasOne(shipment_type::class,'id','shipment_type_id');
    }


    public function shipment_process()
    {
        return $this->hasOne(shipment_process::class,'shipment_id','id');
    }
}
