<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $i = 1;
        $user    = auth()->user();
        $tasks = task::latest()->get();
        //dd(Ticket::all());
        return view('task.index', ['i' => $i])->with('task', $tasks);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        //
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect(route('task.index'))->with('status','New Task Created');

    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        if($request->has('status')){
            $task->status= $request['status'];
            $task->update();
        }
     //  dd($request);
        return redirect(route('task.index'))->with('status', 'Task-updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();
        return redirect(route('task.index'))->with('status', 'task-deleted');
    }
}
