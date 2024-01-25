<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = ['title','content','user_id'];
    //use HasFactory;

    //關聯 一對多 user to issue
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    //關聯 一對多 issue to comment (so comments 複數)
    public function comments(){

        return $this->hasMany(Comment::class);
    }
}
