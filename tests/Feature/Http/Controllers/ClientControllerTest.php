<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Client;
use App\User;
use App\Http\Requests\StoreClientRequest;
use App\Http\Controllers\ClientController;

class ClientControllerTest extends TestCase
{
	use RefreshDatabase;

	protected $user;
	
	
	protected function setUp():void
	{
		parent::setUp() ;
		
		$this->user = factory(User::class)->create();
	}
	
    /** @test */
    function guests_may_not_create_clients()
    {
        $this->get(route('clients.create'))
            ->assertRedirect('/login');
        $this->post('/clients')
            ->assertRedirect('/login');
    }
	
	/** @test */
	public function display_client_creation_form()
	{
		$response = $this->actingAs($this->user)->get(route('clients.create'));
		
		$response->assertStatus(200);
		$response->assertViewIs('clients.create');
	}

	/** @test */
	public function store_validates_using_a_form_request()
	{
		$this->assertActionUsesFormRequest(
			ClientController::class,
			'store',
			StoreClientRequest::class
		);
	}
	
	/** @test */
	public function store_new_client()
	{
		$payload = [
			'first_name'=> 'john',
			'last_name'=>'Doe',
			'email' =>'johndoe@gmail.com',
			'status'=>'active',
			'company'=>'barge studios',
			'phone'=> '+22890389586',
			'website' =>'https://johndoe.com',
			'skype'=>'john-doe',
			'country'=>'Togo',
		];
		
		$response = $this->actingAs($this->user)->post(route('clients.store'),$payload);
		
		  // $response->dumpHeaders();
			// 	$response->dump();
				
		$response->assertStatus(302);

		$response->assertSessionHas('success', 'Client Created Successfully');

		$response->assertRedirect(route('clients.index'));

    $this->assertDatabaseHas('clients',$payload);

	}
	
	/** @test */
	public function edit_client_info()
	{
		$client = factory(Client::class)->create(
			[
			'first_name'=> 'john',
			'last_name'=>'Doe',
			'email' =>'johndoe@gmail.com',
			'status'=>'active',
			'company'=>'barge studios',
			'phone'=> '+22890389586',
			'website' =>'https://johndoe.com',
			'skype'=>'john-doe',
			'country'=>'Togo',
			'created_by' =>$this->user->id,
			]
		);

		$payload = [
			'first_name'=> 'johnny',
			'last_name'=>'wick',
			'email' =>'johndoe@gmail.com',
			'status'=>'inactive',
			'company'=>'rayinc',
			'phone'=> '+233113458789',
			'website' =>'https://johnnywick.com',
			'skype'=>'johnny-wick',
			'country'=>'Ghana',
		];

		$response = $this->actingAs($this->user)->put(route('clients.update', $client->id), $payload);

		$response->assertStatus(302);
		$response->assertSessionHas('success', 'Client Updated Successfully');
		
		$this->assertDatabaseHas('clients',$payload);
		
	}

	/** @test  */
	public function test_all_clients()
	{
		factory(Client::class, 10)->create();
		
		$response = $this->actingAs($this->user)->get(route('clients.index'));
		
		$response->assertStatus(200);
		$response->assertViewHas('clients' );
		
	}

	/** @test */
	public function delete_a_client()
	{
		$client = factory(Client::class)->create();

		$response = $this->actingAs($this->user)->delete(route('clients.destroy', $client->id));
		
		$response->assertStatus(302);
		$response->assertSessionHas('success', 'Client Deleted Successfully');
		
		
		$this->assertDatabaseHas('clients', [
				'id'=>$client->id,
				'deleted_at'=> now()
			]);
		

	}
	

	
	
}