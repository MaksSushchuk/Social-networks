<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPageView()
    {
        $response = $this->get('/register');
        $response->assertViewIs('auth.registration');
        $response->assertStatus(200);
    }

    public function testUserRegister()
    {
        $user = User::factory()->make();

        $response = $this->post('/register', [
            'name' => $user->name,
            'email' => $user->email,
            'email_verification' => 1,
            'avatar' => 'afgag', 
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect('/user/home');
        $this->assertDatabaseHas('users', [
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }
}
