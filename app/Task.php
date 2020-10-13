<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function planning(){
        return $this->belongsTo('App\Planning');
    }
}
