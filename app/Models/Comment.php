<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=['comment'];

    protected $hidden=[];

    //Inverse Relation one to many between comment and post
    public function Post()
    {
        return $this->belongsTo(Post::class);
    }

}
