<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @test itTestOpenPageFormLogin
     */
    public function testLoginPage()
    {
        $openFormLoginPage = $this
            ->get('/authentication/form-login')
            ->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @test itTestLogin
     */
    public function testLogin()
    {
        $storeDataFakerUser = Factory(\App\User::class)
            ->create();

        $storeDataFakerUserArray = $storeDataFakerUser
            ->toArray();

        $checkDataUser = $this
            ->assertDatabaseHas('users', $storeDataFakerUserArray);

        $login = $this
            ->json('post', '/authentication/login', [
                'email' => 'bayubimantarar@gmail.com',
                'password' => '123',
            ])
            ->assertStatus(302);
    }
}
