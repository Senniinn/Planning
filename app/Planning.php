<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function type(){
        return $this->hasOne(Type::class);
    }

    public function task(){
        return $this->hasMany(Task::class);
    }
}
