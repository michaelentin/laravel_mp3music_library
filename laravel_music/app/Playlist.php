<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public $timestamps = false;
    
    public function psongs() 
    {
    	return $this->hasMany('App\Psong');
    }
}
