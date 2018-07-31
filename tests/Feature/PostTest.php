<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetDataPost()
    {
        $user = Factory(\App\User::class)
            ->create();

        $userToArray = $user->toArray();

        $post = Factory(\App\Post::class)
            ->create();

        $postToArray = $post->toArray();

        $checkDataUser = $this
            ->assertDatabaseHas('users', $userToArray);

        $checkDataPost = $this
            ->assertDatabaseHas('posts', $postToArray);

        $pelangganPage = $this
            ->actingAs($user)
            ->get('/dashboard/posts')
            ->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStorePostData()
    {
        $user = Factory(\App\User::class)
            ->create();

        $userToArray = $user->toArray();

        $checkUserData = $this
            ->assertDatabaseHas('users', $userToArray);

        $storePostData = $this
            ->actingAs($user)
            ->json('post', '/dashboard/posts/store', [
                'title' => 'Learning Laravel',
                'slug' => 'learning-laravel',
                'body' => 'Learning Laravel is very easy!'
            ])
            ->assertStatus(302);

        $checkDataPost = $this
            ->assertDatabaseHas('posts', [
                'title' => 'Learning Laravel',
                'slug' => 'learning-laravel',
                'body' => 'Learning Laravel is very easy!'
            ]);
    }
}
