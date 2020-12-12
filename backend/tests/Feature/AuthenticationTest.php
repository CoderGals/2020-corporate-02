<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_login(){
        $user = User::factory()->create([
            'password' => \Hash::make('password')
        ]);
        $response = $this->json('post', '/api/auth/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);
        $response->assertJsonStructure([
            'access_token',
            'token_type'
        ]);
        $response->assertOk();
    }

    public function test_user_can_register(){
        $this->withoutExceptionHandling();
        $data = [
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => 'password'
        ];
        $response = $this->json('post', '/api/auth/register', $data);
        $response->assertStatus(201);
        $response->assertJsonStructure(['id', 'name', 'email']);
        $this->assertDatabaseHas('users', [
            'name' => $data['name'],
            'email' => $data['email']
        ]);
    }
}
