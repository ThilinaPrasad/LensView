<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\User;
use Illuminate\Http\UploadedFile;

class HttpTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    //Guest user http request
    public function testGuest()
    {

        $response = $this->get('/');
        $response->assertStatus(200);
    }

    //Unautherized user http request
    public function testUnautherized()
    {
        $response = $this->get('/unautherized');
        $response->assertStatus(200);
    }

    //dashboard tabs changing http request
    public function testdashboardTabs()
    {
        $user = factory(User::class)->create();
          $response = $this->actingAs($user)->get('/dashboard/upcoming');
        $response->assertStatus(200);
    }

    //load photos as guest http request
    public function testPhotos()
    {
        $response = $this->get('/photos');
        $response->assertStatus(200);
    }

    //load voting contests http request
    public function testVotingContests()
    {
        $response = $this->get('/votes/contests');
        $response->assertStatus(200);
    }


    //photograph create new  http request
    public function testPhotoCreate()
    {
        $user = factory(User::class)->create();
          $response = $this->actingAs($user)->get('photographs/upload/1');
        $response->assertStatus(200);
    }

//show votings images on contest  http request
public function testShowVotingImages()
{
    $user = factory(User::class)->create();
      $response = $this->actingAs($user)->get('votes/photographs/5');
    $response->assertStatus(200);
}

//show winner contests http request
public function testWinnerContests()
{
    $response = $this->get('/winners/contests');
    $response->assertStatus(200);
}

//show winner details http request
public function testShowWinner()
{
    //load according to contest
    $response = $this->get('/winner/5');
    $response->assertStatus(200);
}


//save winner review http request
public function testSaveReview()
{
    $user = factory(User::class)->create();
    $response = $this->actingAs($user)->json('POST', '/review', ['user' => '12','contest'=>'5','image'=>'22','comment'=>'test']);
    $response->assertStatus(200);
}

//add vote route
public function testAddVote()
{
    $user = factory(User::class)->create();
      $response = $this->actingAs($user)->get('/addvote/11');
    $response->assertStatus(200);
}

//remove vote route
public function testRemoveVote()
{
    $user = factory(User::class)->create();
      $response = $this->actingAs($user)->get('/removevote/11');
    $response->assertStatus(200);
}

//load graph request
public function testLoadGraph()
{
    $user = factory(User::class)->create();
    $response = $this->json('POST', '/graph', ['img_id' => '12']);
    $response->assertStatus(200);
}

//delete user account route
public function testDeleteUser()
{
    $user = factory(User::class)->create();
      $response = $this->actingAs($user)->get('/deleteuser/2/5879797');
    $response->assertStatus(200);
}

//profile picture redirect account route
public function testProfileRedirect()
{
    $user = factory(User::class)->create();
      $response = $this->actingAs($user)->get('/profilepic/11');
    $response->assertStatus(200);
}

//change password redirect account route
public function testChangePassRedirect()
{
    $user = factory(User::class)->create();
      $response = $this->actingAs($user)->get('/changepass');
    $response->assertStatus(200);
}

//change notification read request
public function testNotificationRead()
{
    $user = factory(User::class)->create();
      $response = $this->actingAs($user)->get('/read/62');
    $response->assertStatus(200);
}

//change notification readall  request
public function testNotificationReadAll()
{
    $user = factory(User::class)->create();
      $response = $this->actingAs($user)->get('/readall');
    $response->assertStatus(200);
}

//change winner select request
public function testWinnerSelect()
{
    $user = factory(User::class)->create();
      $response = $this->actingAs($user)->get('/winnerselect/5/22/12');
    $response->assertStatus(200);
}

//change notification center request
public function testNotificationCenter()
{
    $user = factory(User::class)->create();
      $response = $this->actingAs($user)->get('/notificationcenter');
    $response->assertStatus(200);
}

}
