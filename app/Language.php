<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $guarded = [];

    public function Developers(){
        return $this->belongsToMany('App\Developer');
    }
}
