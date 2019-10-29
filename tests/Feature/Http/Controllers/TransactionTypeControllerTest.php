<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Http\Requests\StoreTransactionTypeRequest;
use App\Http\Controllers\TransactionTypeController;
use App\Http\Requests\UpdateTransactionTypeRequest;
use App\TransactionType;

class TransactionTypeControllerTest extends TestCase
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
        $this->get(route('transaction-types.create'))
            ->assertRedirect('/login');
        $this->post(route('transaction-types.store'))
            ->assertRedirect('/login');
		}

		/** @test */
	public function display_transaction_type_creation_form()
	{
		$response = $this->actingAs($this->user)->get(route('transaction-types.create'));
		
		$response->assertStatus(200);
		$response->assertViewIs('transaction-types.create');
	}

	/** @test */
	public function store_validates_using_a_form_request()
	{
		$this->assertActionUsesFormRequest(
			TransactionTypeController::class,
			'store',
			StoreTransactionTypeRequest::class
		);
	}
	
		/** @test */
	public function store_new_transaction_type()
	{
		$payload = [
			'name'=> 'Ghana Cedis',			
		];
		
		$response = $this->actingAs($this->user)->post(route('transaction-types.store'),$payload);

		$response->assertStatus(302);

		$response->assertSessionHas('success', 'Transaction Type Created Successfully');

		$response->assertRedirect(route('transaction-types.index'));

    $this->assertDatabaseHas('transaction_types',$payload);

	}

	/** @test */
	public function update_validates_using_a_form_request()
	{
		$this->assertActionUsesFormRequest(
			TransactionTypeController::class,
			'update',
			UpdateTransactionTypeRequest::class
		);
	}

	

			/** @test */
	public function edit_a_transaction_type()
	{
		$transactionType = TransactionType::create([
			'name'=>'Freelance Income'
		]);
		
		$payload = [
			'name'=> 'Taxes',			
		];
		
		$response = $this->actingAs($this->user)->put(route('transaction-types.update', $transactionType->id), $payload);

		$response->assertStatus(302);

		$response->assertSessionHas('success', 'Transaction Type Updated Successfully');

		$response->assertRedirect(route('transaction-types.index'));

    $this->assertDatabaseHas('transaction_types',$payload);
		
	}

	/** @test */
	public function list_all_transaction_type()
	{
		$transactionTypes = factory(TransactionType::class, 2)->create();

		$myTransactionType = TransactionType::create([
			'name'=>'Freelance Income',
			'created_by'=>$this->user->id,
		]);

		$response = $this->actingAs($this->user)->get(route('transaction-types.index'));
		
		$response->assertStatus(200);
		
		$response->assertViewIs('transaction-types.index');
		
		$response->assertViewHas('transactionTypes', function($transactionTypes)  use ($myTransactionType) {
				return $transactionTypes->contains($myTransactionType) && $transactionTypes->count() == 3;
			});	
		
	}

		/** @test */
	public function delete_a_transaction_type()
	{
		$transactionType = TransactionType::create(
			[
			'name'=> 'Franc Cfa',
			'created_by' =>$this->user->id,
			]
		);

		$response = $this->actingAs($this->user)->delete(route('transaction-types.destroy', $transactionType->id));
		
		$response->assertStatus(302);
		$response->assertSessionHas('success', 'Transaction Type Deleted Successfully');
		
		
		$this->assertDatabaseHas('transaction_types', [
				'id'=>$transactionType->id,
				'deleted_at'=> now()
			]);
		

	}

}