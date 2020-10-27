<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    protected $table = 'task';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'task_name',
        'date_task',
        'start',
        'end',
        'long',
        'description',
        'done',
        'planning_id',
    ];

    public function planning(){
        return $this->belongsTo('App\Planning');
    }
}
