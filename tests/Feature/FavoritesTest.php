<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FavoritesTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    function guests_can_not_favorite_anything()
    {
        $this->withExceptionHandling()
            ->post('replies/1/favorites')
            ->assertRedirect('/login');
        
    }

    /** @test */
    function an_authenicated_user_can_favorite_any_reply()
    {
        $this->signIn();
        $reply = create('App\Reply');

        // If I post to a "favorite" end point
        $this->post('replies/' . $reply->id . '/favorites');
        // It should be recorded in the database
        $this->assertCount(1, $reply->favorites);
    }

    /** @test */
    function an_authenticated_user_may_only_favorite_a_reply_once()
    {
        $this->signIn();
        $reply = create('App\Reply');

        // If I post to a "favorite" end point
        try {
            $this->post('replies/' . $reply->id . '/favorites');
            $this->post('replies/' . $reply->id . '/favorites');
        } catch (\Exception $e) {
            $this->fail('Did not expect to insert two favorites');
        }
        // It should be recorded in the database
        $this->assertCount(1, $reply->favorites);
    }
}