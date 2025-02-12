<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_logout_if_not_auth(): void
    {
        $response = $this->get('/auth/logout');

        $response->assertStatus(302);
    }
}
