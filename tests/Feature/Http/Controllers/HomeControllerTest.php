<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class HomeControllerTest extends TestCase
{
		use RefreshDatabase;
		
    /** @test */
    public function index_returns_a_view()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('home'));

        $response->assertStatus(200);
		}
		    /** @test */
    public function index_redirects_when_unauthorized()
    {
        $response = $this->get(route('home'));
        $response->assertStatus(302);
    }
}