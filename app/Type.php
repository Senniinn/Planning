<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = false;

    public function planning(){
        return $this->belongsTo('App\Planning');
    }
}
