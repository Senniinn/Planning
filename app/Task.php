<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

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
    ];

    public function planning(){
        return $this->belongsTo('App\Planning');
    }
}
