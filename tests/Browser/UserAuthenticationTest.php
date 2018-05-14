<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserAuthenticationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testUserRegister()
    {
        //Voter user registration testing
        $this->browse(function (Browser $voter,$photographer,$organizer) {
            $voter->visit('/')
                    ->clickLink('Register')
                    ->assertSee('User Registration')
                    ->value('#name','VoterTesting')
                    ->value('#email','votertesting@gmail.com')
                    ->value('#address','University of Moratuwa')
                    ->Value('#telephone','0716485403')
                    ->Value('#password','123456789')
                    ->value('#password-confirm','123456789')
                    ->click('.checker')
                    ->check('condition')
                    ->click('button[type="submit"]')
                    ->assertSee('LensView Timeline')
                    ->clickLink('View Profile')
                    ->assertTitle('LensView | User Profile')
                    ->click('#deleteButton')
                    ->value('input[type="password"]','123456789')
                    ->click('.btn-red');

                     //Photographer user registration testing
                    $photographer->visit('/')
                    ->clickLink('Register')
                    ->assertSee('User Registration')
                    ->value('#name','PhotographerTesting')
                    ->value('#email','photographertesting@gmail.com')
                    ->value('#address','University of Moratuwa')
                    ->Value('#telephone','0716485403')
                    ->click('.role2')
                    ->Value('#password','123456789')
                    ->value('#password-confirm','123456789')
                    ->click('.checker')
                    ->check('condition')
                    ->click('button[type="submit"]')
                    ->assertSee("Photographer Dashboard")
                    ->clickLink('View Profile')
                    ->assertTitle('LensView | User Profile')
                    ->click('#deleteButton')
                    ->value('input[type="password"]','123456789')
                    ->click('.btn-red');
                    

                    // Contest Organizer registration testing
                    $organizer->visit('/')
                    ->clickLink('Register')
                    ->assertSee('User Registration')
                    ->value('#name','OrganizerTesting')
                    ->value('#email','organizertesting@gmail.com')
                    ->value('#address','University of Moratuwa')
                    ->Value('#telephone','0716485403')
                    ->click('.role3')
                    ->Value('#password','123456789')
                    ->value('#password-confirm','123456789')
                    ->click('.checker')
                    ->check('condition')
                    ->click('button[type="submit"]')
                    ->assertSee("Organizer Dashboard")
                    ->clickLink('View Profile')
                    ->assertTitle('LensView | User Profile')
                    ->click('#deleteButton')
                    ->value('input[type="password"]','123456789')
                    ->click('.btn-red');
        });
}


public function testUserLogin()
    {
        //user login testing
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('LogIn')
                    ->assertSee('User Login')
                    ->value('#email','thilina.prashad25@gmail.com')
                    ->Value('#password','123456789')
                    ->click('button[type="submit"]')
                    ->assertTitle('LensView | Dashboard')
                    ->clickLink('Logout')
                    ->assertTitle('LensView | Home');
        });
}
}
