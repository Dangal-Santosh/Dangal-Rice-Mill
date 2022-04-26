<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
// use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $this->assertTrue(true);
    // }

    // public function test_login(){
    //     $response = $this->post (url('/'),[
    //         'email' => 'shreeram1@gmail.com',
    //         'password' => '12345678'
    //     ] );

    //     $response->assertRedirect('/login');

    // }

    // public function test_login(){
    //     $response = $this->post('/login', [
    //         'email' => 'shreeram1@gmail.com',
    //         'password' => '12345678'
    //     ]);

    //     $response->assertRedirect('/homepage');

    // }

    // public function test_user_dupliation()
    // {
    //     $user1=User::make([
    //     'name'=> 'Santosh Dangal',
    //     'email'=>'santoshdangal79@gmail.com',
    //     ]);

    //     $user2=User::make([
    //         'name'=> 'Shreeram Dimal',
    //         'email'=>'shreeramdhimal1@gmail.com',
    //         ]);
        
    //         $this->assertTrue ($user1->name != $user2->name);

    // }


    public function test_register()
    {
        $response= $this->post('/register',[
            'name'=> 'Hari Lal',
            'email'=> 'hari@gmail.com',
            'password'=> 'hari123',
            'password_confirmation'=>'hari123',
            'address'=>'Jhapa',
            'phone'=>'9860876541',
            'age'=>'30'
        ]);
        $response->assertRedirect('/home');
    }



}
