<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PhotographerFunctionalitiesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testPhotoUpload()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->clickLink('LogIn')
            ->assertSee('User Login')
            ->value('#email','isuriumanawadu@gmail.com')
            ->Value('#password','123456789')
            ->click('button[type="submit"]')
            ->assertTitle('LensView | Dashboard')
            ->visit('/contests/2')
            ->assertSee('Try With Your Creativity & Win')
            ->visit('/photographs/upload/2')
            ->assertSee('Upload Images')
            ->value('#title','Test Photograph Title')
            ->attach('upload_img','C:\Users\Thilina Prasad\Desktop\LensView\1.jpg')
            ->value('#description','Test Photograph description')
            ->clickLink('Logout')
            ->assertTitle('LensView | Home');
        });
    }
}
