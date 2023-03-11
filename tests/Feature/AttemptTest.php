<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AttemptTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {

        $user = User::factory()->createOne();

        $response = $this->post('/signIn', ['email' => $user->email, 'password' => $user->password]);

        $response->assertStatus(200);
    }
}
