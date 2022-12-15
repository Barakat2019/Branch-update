<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

     protected $fillable=['name','created_at','updated_at'];


      //Many to many relation between model role and user,
      //Add Method withTimestamps() to allow insert the created_at and updated_at on pivot table
    public function users()
    {
        return $this->belongsToMany(User::class,'role_users')->withPivot(['expires_at'])->withTimestamps();
    }

}
