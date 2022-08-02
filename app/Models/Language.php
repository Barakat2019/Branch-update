<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    public $timestamp=true;

    public function scopeSelection($query)
    {
        return $query->select('abbr','locale','name','direction','created_at','updated_at');
    }

    public function getDirection()
    {
        return $this->direction=='rtl'?'من اليمن الى اليسار':'من اليسار الى اليمين';
    }
}
