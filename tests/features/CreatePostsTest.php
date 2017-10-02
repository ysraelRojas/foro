<?php 
	
class CreatePostsTest extends FeatureTestCase
{
	public function test_a_user_create_a_post()
	{
		$this->actingAs($user = $this->defaultUser());

		$this->visit(route('posts.create'))
			 ->type('Esta es una pregunta', 'title')
			 ->type('Este es el contenido', 'content')
			 ->press('Publicar');

		$this->seeInDatabase('posts', [
			'title' => 'Esta es una pregunta',
			'content' => 'Este es el contenido',
			'pending' => true
		]);

		$this->see('Esta es una pregunta');

	}

	public function test_creating_a_post_requires_authentication()
	{
		$this->visit(route('posts.create'))
			 ->seePageIs(route('login'));
	}

	public function test_create_post_form_validation()
	{
		$this->actingAs($this->defaultUser())
			 ->visit(route('posts.create'))
			 ->press('Publicar')
			 ->seePageIs(route('posts.create'))
			 ->seeErrors([
			 	'title' => 'El campo título es obligatorio',
			 	'content' => 'El campo contenido es obligatorio'
			 ]);		 
			 
	}

}

 ?>