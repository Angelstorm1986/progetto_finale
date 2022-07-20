<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $guarded = [];

    public function User(){
        return $this->hasOne('App\User');
    }

    public function Reviews(){
        return $this->hasMany('App\Review');
    }

    public function Messages(){
        return $this->hasMany('App\Message');
    }

    public function Languages(){
        return $this->belongsToMany('App\Language');
    }

    public function Sponsors(){
        return $this->hasMany('App\Sponsor');
    }
}
