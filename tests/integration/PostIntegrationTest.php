<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostIntegrationTest extends TestCase
{
    
    public function test_a_slug_is_generted_and_saved_to_the_database()
    {
    	$post = $this->createPost([
        	'title' => 'Como instalar Laravel'
        ]);


        $this->assertSame('como-instalar-laravel', $post->fresh()->slug);
    }
}
