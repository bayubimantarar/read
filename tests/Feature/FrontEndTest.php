<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FrontEndTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomePage()
    {
        $openHomePage = $this
            ->get('/')
            ->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBlogsPage()
    {
        $user = Factory(\App\User::class)
            ->create();

        $userToArray = $user->toArray();

        $checkUserData = $this
            ->assertDatabaseHas('users', $userToArray);

        $storePostData = $this
            ->actingAs($user)
            ->json('post', '/dashboard/posts/store', [
                'user_id'   => 1,
                'title'     => 'Learning Laravel',
                'slug'      => 'learning-laravel',
                'body'      => 'Learning Laravel is very easy!'
            ])
            ->assertStatus(302);

        $openHomePage = $this
            ->get('/blogs/learning-laravel')
            ->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAboutPage()
    {
        $openHomePage = $this
            ->get('/about')
            ->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testContactPage()
    {
        $openHomePage = $this
            ->get('/contact')
            ->assertStatus(200);
    }
}
