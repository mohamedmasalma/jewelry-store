<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class basket extends Model
{
     public  function product(){
    return $this->belongsToMany(product::class)->withPivot('number','price' )->withTimestamps();
}
}