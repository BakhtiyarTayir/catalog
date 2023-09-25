<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ApiAuthTest extends TestCase
{
    use RefreshDatabase;  // Если вы хотите каждый раз сбрасывать базу данных перед тестами

    /** @test */
    public function user_can_register()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $response = $this->postJson('/api/register', $userData);

        $response->assertStatus(201)
            ->assertJson([
                'token' => true,
                'message' => 'Successfully registered'
                
            ]);
        
        $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
    }
}
