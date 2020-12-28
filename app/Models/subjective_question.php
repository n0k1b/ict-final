<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subjective_question extends Model
{
    protected $guarded = [];
    public function topic()
    {
        return $this->belongsTo('App\Models\topic','topic_id','id');
    }

    
    
}
