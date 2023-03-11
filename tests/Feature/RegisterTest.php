<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class registerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->post('/register', ['name' => 'jonatas', 'email' => 'jonatas@jonatas.com', 'password' => 'JonatasBraz77!']);

        $response->assertStatus(200);
    }
}
