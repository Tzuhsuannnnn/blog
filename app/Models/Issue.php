<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = ['title','content'];
    //use HasFactory;

    //一對多(so comments 複數)
    public function comments(){

        return $this->hasMany(Comment::class);
    }
}
