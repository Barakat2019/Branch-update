<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipment_type extends Model
{
    use HasFactory;
    protected $fillable=['id','translation_lang','translation_of','name'];

    public function shipment()
    {
        return $this->belongsTo(shipment::class);
    }
}
