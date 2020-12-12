<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Board;
use \JWTAuth;

class BoardTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_board()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
        $data = [
            'title' => 'board title',
            'description' => 'board description',
        ];
        $response = $this->json('post', '/api/boards?token=' . $token , $data);
        $response->assertStatus(201);
        $response->assertJson([
            'id' => 1,
            'title' => $data['title']
        ]);
        $this->assertDatabaseHas('boards', [
            'id' => 1,
            'title' => $data['title']
        ]);
    }

    public function test_user_can_authorize_another_board_user()
    {
        $this->withoutExceptionHandling();
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $board = Board::factory()->make();
        $user1->boards()->save($board, ['role' => 'author']);
        $token = JWTAuth::fromUser($user1);
        $response = $this->json('post', '/api/boards/' . $board->id .'/authorize?token=' . $token , [
            'email' => $user2->email,
            'role' => 'contributor'
        ]);
        $response->assertJson(['success' => true]);
        $this->assertDatabaseHas('board_user', [
            'board_id' => $board->id,
            'user_id' => $user2->id,
            'role' => 'contributor',
        ]);
    }
}
