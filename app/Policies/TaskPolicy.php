<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    public function edit(User $user, Task $task): bool
    {
        return $task->user_id === $user->id;
    }
}
