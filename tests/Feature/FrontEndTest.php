<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FrontEndTest extends TestCase
{
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
    public function testPostPage()
    {
        $openHomePage = $this
            ->get('/post/example-post')
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
