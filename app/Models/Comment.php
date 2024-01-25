<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //白名單(讓可以操作DB)
    protected $fillable = ['issue_id','name','email','content'];

    //一對多
    public function issue(){
        return $this->belongsTo(Issue::class);
    }
}
