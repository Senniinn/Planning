<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $guarded = [];

    protected $table = 'planning';

    protected $fillable = [
        'id',
        'name',
        'date',
        'type_id',
    ];

    public $timestamps = false;

    public function type(){
        return $this->hasOne(Type::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class, 'planning_id');
    }

    public function getTasksCount(){
        return $this->tasks()->count();
    }
}
