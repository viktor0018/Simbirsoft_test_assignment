<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class LoginTest extends DuskTestCase
{
   use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Авторизация');
        });

        $user = User::factory()->create([
            'email' => 'v.kalyaev@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $this->browse(function ($browser)  {
            $browser->visit('/login')
                    ->type('email', 'v.kalyaev@gmail.com')
                    ->type('password', 'password')
                    ->press('Авторизоваться')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Главная');
        });

    }
}
