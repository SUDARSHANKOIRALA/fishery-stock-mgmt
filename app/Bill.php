<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
     public function item(){
        return $this->belongsTO('App\Item');
    }
    public function customer(){
    	return $this->belongsTo('App\customer');
    }
}
