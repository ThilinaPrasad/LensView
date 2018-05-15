<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class VoterFunctionalitiesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

     //Test the time line vote
    public function testTimelineVote()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->clickLink('LogIn')
            ->assertSee('User Login')
            ->value('#email','aaaa@gmail.com')
            ->Value('#password','123456789')
            ->click('button[type="submit"]')
            ->assertTitle('LensView | Dashboard')
            ->click('#vote-btn-6')
            ->clickLink('Logout')
            ->assertTitle('LensView | Home');
        });
    }

    //Test voter page vote
    public function testVoterPageVote()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->clickLink('LogIn')
            ->assertSee('User Login')
            ->value('#email','aaaa@gmail.com')
            ->Value('#password','123456789')
            ->click('button[type="submit"]')
            ->assertTitle('LensView | Dashboard')
            ->visit('/votes/photographs/1')
            ->assertSee('Add Your Votes')
            ->click('#vote-btn-3')
            ->clickLink('Logout')
            ->assertTitle('LensView | Home');
        });
    }
}
