<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Post;

class PostIntegrationTest extends TestCase
{
    
    public function test_a_slug_is_generted_and_saved_to_the_database()
    {

    	$user = $this->defaultUser();

        $post = factory(Post::class)->make([
        	'title' => 'Como instalar Laravel'
        ]);

        $user->posts()->save($post);

        $this->assertSame('como-instalar-laravel', $post->fresh()->slug);
    }
}
