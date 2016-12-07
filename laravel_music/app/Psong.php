<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Psong extends Model
{

    public function playlist() 
    {	
    	return $this->belongsTo('App\Playlist');
    }

    public function songs() 
    {
    	return $this->hasOne('App\Song');
    }
}
