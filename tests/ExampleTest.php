<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $user = factory(\App\User::class)->create([
            'name' => 'Ysrael Rojas',
            'email' => 'yrra_rojas@hotmail.com'
        ]);

        $this->actingAs($user, 'api')
             ->visit('api/user')
             ->see('Ysrael Rojas')
             ->see('yrra_rojas@hotmail.com');
    }
}
