<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $guarded = [];

	public function company() {
		return $this->belongsTo(\App\Modules\Company\Models\Company::class);
	}

  // public function project() {
  // 	return $this->belongsTo(\App\Modules\Project\Models\Project::class);
  // }

	public function taskboard() {
		return $this->belongsTo(Taskboard::class);
	}

	public function created_by() {
		return $this->belongsTo(\App\Modules\Employee\Models\Employee::class, 'created_by');
	}

	public function task_comments() {
		return $this->hasMany(TaskComment::class);
	}

	public function task_files() {
		return $this->hasMany(TaskFile::class);
	}

	public function task_members() {
		return $this->hasMany(TaskMember::class);
	}

}
