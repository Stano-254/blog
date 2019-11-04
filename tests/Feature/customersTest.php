<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class customersTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function only_logged_in_users_can_see_the_customers_list(){
        $response = $this->get('/customers')
            ->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_user_can_see_customer_list(){

        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/customers')
            ->assertOk();
    }
}
