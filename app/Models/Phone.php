<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable=['phone','user_id'];

    /*if you don't need to put the fillable property and list all
    the field you can use the guarded property and set empty
    */

  //  protected $guarded=[];

    protected $hidden=[];

    //Inverse Relation for Has One
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
