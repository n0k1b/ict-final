<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class topic extends Model
{
    protected $guarded = [];
    public function chapter()
    {
        return $this->belongsTo('App\Models\chapter','chapter_id','id');
    }
}
