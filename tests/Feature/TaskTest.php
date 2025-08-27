<?php

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows an authenticated user to create a task', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post(route('tasks.store'), ['content' => 'My new task'])
        ->assertRedirect(route('index'));

    $this->assertDatabaseHas('tasks', [
        'content' => 'My new task',
        'user_id' => $user->id,
    ]);
});

it('allows a user to delete their own task', function () {
    $user = User::factory()->create();
    $task = Task::factory()->for($user)->create();

    $this->actingAs($user)
        ->delete(route('tasks.destroy', $task))
        ->assertRedirect(route('index'));

    $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
});

it('prevents a user from deleting another users task', function () {
    $owner = User::factory()->create();
    $other = User::factory()->create();
    $task = Task::factory()->for($owner)->create();

    $this->actingAs($other)
        ->delete(route('tasks.destroy', $task))
        ->assertStatus(403);

    $this->assertDatabaseHas('tasks', ['id' => $task->id]);
});
