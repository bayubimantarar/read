<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testPostPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/authentication/form-login')
                ->type('email', 'bayubimantarar@gmail.com')
                ->type('password', '123')
                ->press('login')
                ->clickLink('Posts')
                ->assertPathIs('/dashboard/posts');
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testFormCreatePostPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/authentication/form-login')
                ->type('email', 'bayubimantarar@gmail.com')
                ->type('password', '123')
                ->press('login')
                ->clickLink('Posts')
                ->clickLink('Create new posts')
                ->type('input[name=title]', 'a Test from laravel dusk')
                ->type('textarea[name=body]', 'a Test from laravel dusk')
                ->press('save')
                ->assertPathIs('/dashboard/posts/create');
        });
    }
}
