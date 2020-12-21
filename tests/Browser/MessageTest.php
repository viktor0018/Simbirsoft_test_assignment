<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        $user = User::factory()->create([
            'email' => 'v.kalyaev@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $this->browse(function ($browser)  {
            $browser->loginAs(User::find(1))
                    ->visit('/addmessage')
                    ->type('message', 'My test message')
                    ->press('Добавить')
                    ->assertSee('Заметка добавлена');
        });

        $this->browse(function ($browser)  {
            $browser->visit('/messages')
                    ->assertSee('My test message');
        });
    }
}
