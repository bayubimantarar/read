<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthenticationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->browse(function (Browser $browser) {
             $browser->visit('/authentication/form-login')
                ->type('email', 'bayubimantarar@gmail.com')
                ->type('password', '123')
                ->press('login')
                ->assertPathIs('/dashboard');
        });
    }
}
