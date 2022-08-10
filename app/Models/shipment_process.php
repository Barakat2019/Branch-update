<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipment_process extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable=['process_id','shipment_type_id','shipment_id','status','start_time'];

    public function shipment()
    {
        return $this->belongsTo(shipment::class);
    }

}
