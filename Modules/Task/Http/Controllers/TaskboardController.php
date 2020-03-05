<?php

namespace Modules\Task\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Taskboard;

class TaskboardController extends Controller
{
    /**
     * Shows Taskboard page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // $this->breadcrumb(__('Dashboard'), route('dashboard'))
        //      ->addCrumb(__('Task Board'));

        // $this->title(__('Taskboard'));

        // $view = auth()->user()->hasRole('admin') ? 'list-admin' : 'list';
        // $this->view('task::taskboard');
        return view('task::taskboard');

    }

    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function loadAll(Request $request)
    {
        return Taskboard::loadAll($request);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        // dd($request->all());
        return Taskboard::create($request);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        return Taskboard::update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        return Taskboard::delete($id);
    }
}
