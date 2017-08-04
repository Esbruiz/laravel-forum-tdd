<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserCreatesThreadsTest extends TestCase
{
   use DatabaseMigrations;

   /** @test */
   public function an_authenticated_user_can_create_threads()
   {
        $this->actingAs(factory('App\User')->create());
        $thread = factory('App\Thread')->make();

        $this->post(route('storeThread'), $thread->toArray());

       $response = $this->get($thread->path());

       $response->assertSee($thread->title)->assertSee($thread->body);
   }

    /** @test */
    public function an_unauthenticated_user_cant_create_threads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $thread = factory('App\Thread')->make();
        $response = $this->post(route('storeThread'), $thread->toArray());
    }
}
