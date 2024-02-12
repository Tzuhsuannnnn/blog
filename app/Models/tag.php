<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $fillable = ['id','name'];
    use HasFactory;

    //多對多 issue to tag 
    public function issues()
    {
        return $this->belongsToMany(Issue::class);
    }



}

