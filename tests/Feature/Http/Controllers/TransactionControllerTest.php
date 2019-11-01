<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Controllers\TransactionController;
use App\Http\Requests\UpdateTransactionRequest;
use App\Project;
use App\IncomeSource;
use App\Currency;
use App\TransactionType;
use App\Transaction;

class TransactionControllerTest extends TestCase
{
    use RefreshDatabase;
	
  	protected $user;
		
		protected function setUp():void 
		{
			parent::setUp();
			
			$this->user = factory(User::class)->create();
		}

		 /** @test */
    function guests_may_not_create_transactions()
    {
        $this->get(route('transactions.create'))
            ->assertRedirect('/login');
        $this->post(route('transactions.store'))
            ->assertRedirect('/login');
		}

			/** @test */
	public function display_transaction_creation_form()
	{
		$response = $this->actingAs($this->user)->get(route('transactions.create'));
		
		$response->assertStatus(200);
		$response->assertViewIs('transactions.create');
	}

			/** @test */
	public function store_validates_using_a_form_request()
	{
		$this->assertActionUsesFormRequest(
			TransactionController::class,
			'store',
			StoreTransactionRequest::class
		);
	}

		/** @test */
	public function store_new_transaction()
	{
		$project = factory(Project::class)->create();
		$currency = factory(Currency::class)->create();
		$income_source = factory(IncomeSource::class)->create();
		$transaction_type = factory(TransactionType::class)->create();

		$payload = [
			'name' => 'Transaction101',
			'transaction_type_id' => $transaction_type->id,
			'currency_id' => $currency->id,
			'income_source_id' => $income_source->id,
			'description' => 'this a new transaction',
			'transaction_date' =>	'2019-08-09',
			'amount' => 20000,
			'project_id' => $project->id,
		];
		
		$response = $this->actingAs($this->user)->post(route('transactions.store'),$payload);

		$response->assertStatus(302);

		$response->assertSessionHas('success', 'Transaction Created Successfully');

		$response->assertRedirect(route('transactions.index'));

    $this->assertDatabaseHas('transactions',$payload);

	}

		/** @test */
	public function update_validates_using_a_form_request()
	{
		$this->assertActionUsesFormRequest(
			TransactionController::class,
			'update',
			UpdateTransactionRequest::class
		);
	}

	  /** @test */
	public function edit_a_transaction()
	{
		$transaction = factory(Transaction::class)->create();

		$project = factory(Project::class)->create();
		$currency = factory(Currency::class)->create();
		$income_source = factory(IncomeSource::class)->create();
		$transaction_type = factory(TransactionType::class)->create();

		$payload = [
			'name' => 'Transaction102',
			'transaction_type_id' => $transaction_type->id,
			'currency_id' => $currency->id,
			'income_source_id' => $income_source->id,
			'description' => 'this an update transaction',
			'transaction_date' =>	'2019-08-09',
			'amount' => 20000,
			'project_id' => $project->id,
		];
		
		
		$response = $this->actingAs($this->user)->put(route('transactions.update', $transaction->id), $payload);

		$response->assertStatus(302);

		$response->assertSessionHas('success', 'Transaction Updated Successfully');

		$response->assertRedirect(route('transactions.index'));

    $this->assertDatabaseHas('transactions',$payload);
		
	}

				/** @test */
	public function list_all_transactions()
	{
		$transactions = factory(Transaction::class, 10)->create();

		$response = $this->actingAs($this->user)->get(route('transactions.index'));
		
		$response->assertStatus(200);
		
		$response->assertViewIs('transactions.index');
		
		$response->assertViewHas('transactions', function($transactions){
				return $transactions->count() == 10;
			});	
		
	}

				/** @test */
	public function show_a_transaction()
	{
		$transaction = factory(Transaction::class)->create();

		$response = $this->actingAs($this->user)->get(route('transactions.show', $transaction->id));
		
		$response->assertStatus(200);
		
		$response->assertViewIs('transactions.show');
			
		
	}

	/** @test */
	public function delete_a_transaction()
	{
		$transaction = factory(Transaction::class)->create();
		
		$response = $this->actingAs($this->user)->delete(route('transactions.destroy', $transaction->id));
		
		$response->assertStatus(302);
		$response->assertSessionHas('success', 'Transaction Deleted Successfully');
		
		$this->assertDatabaseHas('transactions', [
				'id'=>$transaction->id,
				'deleted_at'=> now()
			]);
		

	}

}
