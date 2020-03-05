<?php

namespace Modules\Task\Services;

use Illuminate\Http\JsonResponse;
use Modules\Task\Entities\Task;
use Modules\Task\Entities\Taskboard;

class TaskService
{
    /**
    * @var Task
    */
    protected $model;

    /**
    * TaskService constructor.
    */
    public function __construct()
    {
        $this->model = new Task();
    }

    /**
    * @param $query
    * @return JsonResponse
    */
    public function loadAll($query): JsonResponse
    {
        // $taskboard = Taskboard::whereId($query->taskboard_id)->with(['tasks.task_comments', 'tasks.task_files', 'tasks.task_members', 'taskboard'])->first();
        // dd($taskboard);
        $tasks = $this->model::where('taskboard_id', $query->taskboard_id)->with(['taskboard', 'task_comments', 'task_files', 'task_members'])->get();

        return response()->json([
            'status' => 1,
            'tasks' => $tasks,
        ]);
    }

    /**
    * @param $query
    * @return JsonResponse
    */
    public function create($query): JsonResponse
    {
        // dd($query->all());
        $task = $this->model->create(
            [
                'company_id' => $query->array['company_id'],
                // 'project_id' => $query->project_id,
                'taskboard_id' => $query->array['taskboard_id'],
                'task_title' => $query->array['task_title'],
                // 'description' => $query->description,
                // 'start_date' => $query->start_date,
                'priority' => $query->array['priority'],
                'due_date' => $query->array['due_date'],
                'status' => 1,
                'created_by' => 1,
                'weight' => 10,
                'completed_at' => '2020-03-27',
            ]
        );

        $taskboard = $task->taskboard;

        return response()->json([
            'status' => 1,
            'taskboard' => $taskboard
        ]);
    }

    /**
    * @param $query
    * @return JsonResponse
    */
    protected function update($query, $id): JsonResponse
    {

        $task = $this->model->find($id);

        $task->update(
            [
                'company_id' => $query->company_id,
                'taskboard_id' => $query->taskboard_id,
                'task_title' => $query->task_title,
                'priority' => $query->priority,
                'due_date' => $query->due_date,
            ]
        );

        $taskboard = $task->taskboard;

        return response()->json([
            'status' => 1,
            'taskboard' => $taskboard
        ]);
    }

    /**
    * @param $query
    * @return JsonResponse
    */
    public function save($query): JsonResponse
    {
        return $query->has('id') ? $this->model->update($query) : $this->model->create($query);
    }

    public function delete($id)
    {
        $task = $this->model->find($id);

        $taskboard = $task->taskboard;

        $task->delete();

        return response()->json([
            'status' => 1,
            'taskboard' => $taskboard
        ]);
    }

}
