<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_the_register_form_is_returns_successful_response(): void
    {
        $response = $this->get('/auth/login');

        $response->assertStatus(200);
    }


    public function test_the_incorrect_data(): void
    {
        $response = $this->post('/auth/register',[
            'email' => null,
            'password' => 'password',
        ]);

        $response->assertStatus(302);
    }

    public function test_the_correct_data(): void
    {
        $response = $this->post('/auth/register',[
            'email' => 'test@test.com',
            'password' => 'password',
        ]);

        $response->assertStatus(302);
    }
}
