<?php

namespace Modules\Task\Services;

use Illuminate\Http\JsonResponse;
use Modules\Task\Entities\Taskboard;

class TaskboardService
{
    /**
    * @var Taskboard
    */
    protected $model;

    /**
    * TaskboardService constructor.
    */
    public function __construct()
    {
    	$this->model = new Taskboard();
    }

    /**
    * @param $query
    * @return JsonResponse
    */
    public function loadAll($query): JsonResponse
    {
        // dd($query->all());
        $taskboards = $this->model::where('company_id', $query->company_id)->with(['tasks.task_comments', 'tasks.task_files', 'tasks.task_members'])->get();;

        return response()->json([
            'status' => 1,
            'taskboards' => $taskboards,
        ]);
    }

    /**
    * @param $query
    * @return JsonResponse
    */
    public function create($query): JsonResponse
    {
        // dd($query->label_color);
        $taskboard = $this->model->create(
            [
                // 'company_id' => $query->company_id,
                // 'name' => $query->name,
                // 'slug' => \Str::slug($query->slug),
                // 'label_color' => $query->label_color,
                // 'weight' => $query->weight,
                'company_id' => 1,
                'name' => $query->title,
                'slug' => $query->title,
                'label_color' => $query->label_color,
                'weight' => 5,
            ]
        );
        $company_id = $taskboard->company_id;
        return response()->json([
            'status' => 1,
            'company_id' => $company_id
        ]);
    }

    /**
    * @param $query
    * @return JsonResponse
    */
    public function update($query, $id): JsonResponse
    {
        $taskboard = $this->model->find($id);
        $company_id = $taskboard->company_id;
        $taskboard->update(
            [
                // 'company_id' => $query->company_id,
                'name' => $query->name,
                // 'slug' => \Str::slug($query->slug),
                'label_color' => $query->label_color,
                // 'weight' => $query->weight,
            ]
        );

        return response()->json([
            'status' => 1,
            'company_id' => $company_id
        ]);
    }

    /**
    * @param $query
    * @return JsonResponse
    */
    public function save($query): JsonResponse
    {
        return $query->has('id') ? $this->update($query) : $this->create($query);
    }

    public function delete($id)
    {
        // dd($id);

        $data = $this->model::find($id);
        $company_id = $data->company_id;
        if ($data->tasks->count() > 0) {
            throw new TaskboardDeleteException;
        } else $data->delete();

        return response()->json([
            'status' => 1,
            'company_id' => $company_id
        ]);
    }
}
