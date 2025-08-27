<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Models\Task;
use App\Services\TaskService;

class TaskController extends Controller
{
    public function __construct(protected TaskService $taskService) {}

    public function index()
    {
        $tasks = $this->taskService->tasksForAuthenticatedUser();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskCreateRequest $request)
    {
        $this->taskService->create($request->validated()['content']);
        return to_route('index');
    }

    public function destroy(Task $task)
    {
        $this->taskService->remove($task);
        return to_route('index');
    }
}
