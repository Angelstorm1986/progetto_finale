<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function Developer(){
        return $this->belongsTo('App\Developer');
    }
}
