<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MessageTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser)  {
            $browser->visit('/register')
                    ->type('name', 'Viktor')
                    ->type('email', 'v.kalyaev@gmail.com')
                    ->type('password', 'password')
                    ->type('password_confirmation', 'password')
                    ->press('Регистрация')
                    ->assertPathIs('/dashboard');
        });

        $this->browse(function ($browser)  {
            $browser->visit('/addmessage')
                    ->type('message', 'My test message')
                    ->press('Добавить')
                    ->assertPathIs('/addmessage');
        });

        $this->browse(function ($browser)  {
            $browser->visit('/messages')
                    ->assertSee('My test message');
        });
    }
}
