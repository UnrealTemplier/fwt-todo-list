<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function __construct(protected TaskService $taskService) {}

    public function index(): View
    {
        $tasks = $this->taskService->tasksForAuthenticatedUser();
        return view('tasks.index', compact('tasks'));
    }

    public function create(): View
    {
        return view('tasks.create');
    }

    public function store(TaskCreateRequest $request): RedirectResponse
    {
        $this->taskService->create($request->validated()['content']);
        return to_route('index');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $this->taskService->remove($task);
        return to_route('index');
    }

    public function toggle(Task $task): RedirectResponse
    {
        $this->taskService->toggle($task);
        return to_route('index');
    }
}
