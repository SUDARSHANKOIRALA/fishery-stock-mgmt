<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    
    public function bill(){
        return $this->hasMany('App\Bill');
    }
}
