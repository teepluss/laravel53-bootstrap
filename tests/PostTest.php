<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLoginSuccess()
    {
        $this->visit('/login')
             ->type('teepluss@gmail.com', 'email')
             ->type('password', 'password')
             ->press('Login')
             ->see('You are logged in!');
    }
}
