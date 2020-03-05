<?php

namespace Modules\Task\Services;

use Illuminate\Http\JsonResponse;

class TaskCommentService
{
    /**
    * @var Task
    */
    protected $model;

    /**
    * TaskCommentService constructor.
    */
    public function __construct()
    {
        $this->model = \Modules\Task\Entities\TaskComment::class;
    }

    /**
    * @param $query
    * @return JsonResponse
    */
    public function loadAll($query): JsonResponse
    {
        $task_comments = $this->model::where('task_id', $query->task_id)->get();

        return response()->json([
            'status' => 1,
            'task_comments' => $task_comments,
        ]);
    }

    /**
    * @param $query
    * @return JsonResponse
    */
    protected function create($query): JsonResponse
    {
        $this->model->create(
            [
                'task_id' => $query->task_id,
                'employee_id' => $query->employee_id,
                'comment' => $query->comment,
            ]
        );

        return response()->json([
            'status' => 1
        ]);
    }

    /**
    * @param $query
    * @return JsonResponse
    */
    protected function update($query): JsonResponse
    {
        $task = $this->model->find($query->id);

        $task->update(
            [
                'task_id' => $query->task_id,
                'employee_id' => $query->employee_id,
                'comment' => $query->comment,
            ]
        );

        return response()->json([
            'status' => 1
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

    protected function delete($id)
    {
        $this->model->find($id)->delete();

        return response()->json([
            'status' => 1
        ]);
    }

}
