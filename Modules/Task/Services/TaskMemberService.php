<?php

namespace Modules\Task\Services;

use Illuminate\Http\JsonResponse;

class TaskMemberService
{
    /**
    * @var Task
    */
    protected $model;

    /**
    * TaskMemberService constructor.
    */
    public function __construct()
    {
        $this->model = \Modules\Task\Entities\TaskMember::class;
    }

    /**
    * @param $query
    * @return JsonResponse
    */
    public function loadAll($query): JsonResponse
    {
        $task_members = $this->model::where('task_id', $query->task_id)->get();

        return response()->json([
            'status' => 1,
            'task_members' => $task_members,
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
                'uploaded_by' => $query->uploaded_by,
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
                'uploaded_by' => $query->uploaded_by,
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
