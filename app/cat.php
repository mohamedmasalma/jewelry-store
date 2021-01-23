<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cat extends Model
{
     public  function product(){
    return $this->hasMany(product::class);
}
}