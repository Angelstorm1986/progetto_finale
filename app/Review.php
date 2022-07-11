<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = [];

    public function Developer(){
        return $this->belongsTo('App\Developer');
    }
}
