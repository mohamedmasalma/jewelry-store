<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
     public function cat(){
    	return $this->belongsTo(cat::class);
    }

     public  function basket(){
    return $this->belongsToMany(basket::class)->withPivot('number','price')->withTimestamps();
}
}
