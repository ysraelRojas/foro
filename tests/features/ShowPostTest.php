<?php

class ShowPostTest extends FeatureTestCase
{
    public function test_a_user_can_see_the_post_details()
    {
    	$user = $this->defaultUser([
    		'name' => 'Ysrael Rojas'
    	]);

    	$post = $this->createPost([
    		'title' => 'Como instalar Laravel',
    		'content' => 'Este es el contenido del post',
    		'user_id' => $user->id
    	]);

    	
    	$this->visit($post->url)
    		 ->seeInElement('h1', $post->title)
    		 ->see($post->content)
    		 ->see('Ysrael Rojas');

    }

    public function test_old_urls_are_redirected()
    {
    	$user = $this->defaultUser();

    	$post = $this->createPost([
    		'title' => 'Old Title',
    		'user_id' => $user->id
    	]);

    	$user->posts()->save($post);

    	$url = $post->url;

    	$post->update(['title' => 'New Title']);

    	$this->visit($url)
    		 ->seePageIs($post->url);
    	
    }
}
