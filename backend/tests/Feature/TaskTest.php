<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \JWTAuth;
use App\Models\User;
use App\Models\Task;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_a_task(){
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
        $dueDate = now();
        $data = [
            'title' => 'title',
            'description' => 'description',
            'due_date' => $dueDate,
            'completed' => false,
        ];
        $response = $this->json('post', '/api/tasks?token=' . $token, $data);
        $response->assertStatus(201);
        $response->assertJson([
            'id' => 1,
            'title' => $data['title'],
            'description' => $data['description'],
        ]);
        $this->assertDatabaseHas('tasks', [
            'id' => 1,
            'title' => $data['title'],
            'description' => $data['description'],
        ]);
    }

    public function test_user_can_delete_a_task(){
        $user = User::factory()->create();
        $task = Task::factory()->create([
            'user_id' => $user->id
        ]);
        $token = JWTAuth::fromUser($user);
        $response = $this->json('delete', '/api/tasks/' . $task->id .'?token=' . $token, []);
        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
            'title' => $task->title,
        ]);
    }

    public function test_user_can_view_own_tasks(){
        $user = User::factory()->create();
        $numberOfTasks = 3; 
        $task = Task::factory()->count($numberOfTasks)->create([
            'user_id' => $user->id
        ]);
        $token = JWTAuth::fromUser($user);
        $response = $this->json('get', '/api/tasks?token=' . $token);
        $response->assertOk();
        $this->assertEquals($numberOfTasks, count($response->original));
    }

    public function test_user_can_update_task(){
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $task = Task::factory()->create([
            'user_id' => $user->id
        ]);
        $token = JWTAuth::fromUser($user);
        $response = $this->json('put', '/api/tasks/'. $task->id . '?token=' . $token, [
            'title' => 'new title',
            'description' => 'new description',
            'due_date' => now(),
            'completed' => false,
        ]);
        $response->assertOk();
        $response->assertJson([
            'id' => $task->id,
            'title' => 'new title',
            'description' => 'new description',
        ]);
    }
}
