<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Support\Str;

class LoginControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPageView()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function testUserAuthenticate(){
        

        $user = User::factory()->create();

        $response = $this->post('/login',[
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->actingAs($user);
        $response->assertStatus(302);
        $response->assertRedirect('user/home');

    }

    public function testUserAuthenticateFailed()
    {
        $user = User::factory()->create();


        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(302);

        $this->assertGuest();
    }

    public function testUserCanLogout()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/logout');

        $this->assertFalse(Auth::check());
        $response->assertStatus(302);
        $response->assertRedirect(route('login.index'));
    }


}
