<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Currency;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Controllers\CurrencyController;

class CurrencyControllerTest extends TestCase
{
	use RefreshDatabase;
	
		protected $user;
		
		protected function setUp():void 
		{
			parent::setUp();
			
			$this->user = factory(User::class)->create();
		}
		 /** @test */
    function guests_may_not_create_currency()
    {
        $this->get(route('currencies.create'))
            ->assertRedirect('/login');
        $this->post(route('currencies.store'))
            ->assertRedirect('/login');
		}
		

	/** @test */
	public function display_currency_creation_form()
	{
		$response = $this->actingAs($this->user)->get(route('currencies.create'));
		
		$response->assertStatus(200);
		$response->assertViewIs('currencies.create');
	}


	/** @test */
	public function store_validates_using_a_form_request()
	{
		$this->assertActionUsesFormRequest(
			CurrencyController::class,
			'store',
			StoreCurrencyRequest::class
		);
	}

	/** @test */
	public function store_new_client()
	{
		$payload = [
			'name'=> 'Ghana Cedis',
			'code'=>'GHS',
			'main_currency' =>1,
			
		];
		
		$response = $this->actingAs($this->user)->post(route('currencies.store'),$payload);

		$response->assertStatus(302);

		$response->assertSessionHas('success', 'Currency Created Successfully');

		$response->assertRedirect(route('currencies.index'));

    $this->assertDatabaseHas('currencies',$payload);

	}

		/** @test */
	public function edit_client_info()
	{
		$client = Currency::create(
			[
			'name'=> 'Franc Cfa',
			'code'=>'FCFA',
			'created_by' =>$this->user->id,
			]
		);

		$payload = [
			'name'=> 'US Dollar',
			'code'=>'USD',
			'main_currency'=> 0
		];

		$response = $this->actingAs($this->user)->put(route('currencies.update', $client->id), $payload);

		$response->assertStatus(302);
		$response->assertSessionHas('success', 'Currency Updated Successfully');
		
		$this->assertDatabaseHas('currencies',$payload);
		
	}

	/** @test  */
	public function list_all_currencies()
	{
		factory(Currency::class, 10)->create();
		
		$response = $this->actingAs($this->user)->get(route('currencies.index'));
		
		$response->assertStatus(200);
		$response->assertViewHas('currencies' );
		
	}

	/** @test */
	public function delete_a_customer()
	{
		$currency = factory(Currency::class)->create(
			[
			'name'=> 'Franc Cfa',
			'code'=>'FCFA',
			'created_by' =>$this->user->id,
			]
		);

		$response = $this->actingAs($this->user)->delete(route('currencies.destroy', $currency->id));
		
		$response->assertStatus(302);
		$response->assertSessionHas('success', 'Currency Deleted Successfully');
		
		
		$this->assertDatabaseHas('currencies', [
				'id'=>$currency->id,
				'deleted_at'=> now()
			]);
		

	}

	
}