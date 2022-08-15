<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipment_process extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable=['id','process_id','shipment_type_id','shipment_id','employee_id','status'];

    public function shipment()
    {
        return $this->belongsTo(shipment::class);
    }

}
