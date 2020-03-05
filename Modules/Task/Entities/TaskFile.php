<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;

class TaskFile extends Model
{
    protected $guarded = [];

    public function task() {
    	return $this->belongsTo(Task::class);
    }

    public function uploaded_by() {
    	return $this->belongsTo(\App\Modules\Employee\Models\Employee::class, 'uploaded_by');
    }
}
