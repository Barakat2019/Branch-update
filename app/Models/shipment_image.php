<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipment_image extends Model
{
    use HasFactory;
    protected $fillable=['image','shipment_id'];

    public function shipment()
    {
        return $this->belongsTo(shipment::class,'shipment_id');
    }
}
