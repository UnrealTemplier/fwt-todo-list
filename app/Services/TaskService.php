<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class TaskService
{
    public function tasksForAuthenticatedUser(): Collection
    {
        return $this->tasksForUser(Auth::user());
    }

    public function tasksForUser(User $user): Collection
    {
        return $user->tasks()->get();
    }

    public function create(string $content): void
    {
        Task::create([
            'content' => $content,
            'user_id' => Auth::id()
        ]);
    }
}
