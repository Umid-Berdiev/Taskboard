<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;

class Taskboard extends Model
{
    protected $guarded = [];

    public function company() {
    	return $this->belongsTo(\App\Modules\Company\Models\Company::class);
    }

    public function tasks() {
    	return $this->hasMany(Task::class);
    }
}
