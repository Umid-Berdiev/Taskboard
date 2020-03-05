<?php

namespace Modules\Task\Services;

use Illuminate\Http\JsonResponse;

class TaskFileService
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
        $this->model = \Modules\Task\Entities\TaskFile::class;
    }

    /**
    * @param $query
    * @return JsonResponse
    */
    public function loadAll($query): JsonResponse
    {
        $task_files = $this->model::where('task_id', $query->task_id)->get();

        return response()->json([
            'status' => 1,
            'task_files' => $task_files,
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
                'filename' => $query->filename,
                'description' => $query->description,
                'size' => $query->size,
                'path' => $query->path,
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
                'filename' => $query->filename,
                'description' => $query->description,
                'size' => $query->size,
                'path' => $query->path,
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
