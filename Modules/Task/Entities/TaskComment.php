<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;

class TaskComment extends Model
{
    protected $guarded = [];

    public function task() {
    	return $this->belongsTo(Task::class);
    }

    public function employee() {
    	return $this->belongsTo(\App\Modules\Employee\Models\Employee::class);
    }
}
