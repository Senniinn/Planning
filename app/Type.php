<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function planning(){
        return $this->belongsTo('App\Planning');
    }
}
