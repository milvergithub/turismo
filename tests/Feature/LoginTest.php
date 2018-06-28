<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testLoginPost(){

  $user = factory(User::class)->create([
            'email' => 'john@example.com',
            'contrasenia' => bcrypt('testpass123')
        ]);

        $this->visit(route('login'))
            ->type($user->email, 'email')
            ->type($user->contrasenia, 'password')
            ->press('Login')
            ->see('Successfully logged in')
            ->onPage('/home');
    
       }
}
