<?php

namespace Tests\Feature;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase; // use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;/**
      * A basic feature test example.
      */
    public function test_user_can_be_created(): void
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);
        $this->expectException(\Illuminate\Database\QueryException::class);
        User::factory()->create([
            'name' => '田中太郎',
            'email' => 'john@example.com',
        ]);
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
