<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use Illuminate\Http\UploadedFile;
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
        $avatar = UploadedFile::fake()->image('avatar.png', 100, 100);
        $response = $this->post('/register', [
            'username' => $user->username,
            'email' => $user->email,
            'email_verification' => 1,
            'avatar' => $avatar,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect('/user/home');
        $this->assertDatabaseHas('users', [
            'username' => $user->username,
            'email' => $user->email,
        ]);
    }


}
