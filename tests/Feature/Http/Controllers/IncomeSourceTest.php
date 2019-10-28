<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\IncomeSource;

class IncomeSourceTest extends TestCase
{
	use RefreshDatabase;
	
	protected $user;
	
	protected function setUp():void
	{
		parent::setUp();

		$this->user = factory(User::class)->create();
		
	}
	
	/** @test */
	public function guest_may_not_create_income_source()
	{
		$this->get(route('income-sources.index'))
					->assertRedirect('/login');

		$this->post(route('income-sources.store'))
					->assertRedirect('/login');
	}

	/** @test */
	public function display_income_source_form()
	{
		$response = $this->actingAs($this->user)->get(route('income-sources.create'));
					
		$response->assertStatus(200)
							->assertViewIs('income-sources.create');
	}

	/** @test */
	public function store_income_source()
	{
		$payload = [
			'name'=> 'upwork',
			'fee_percent'=> 15
		];

		$response = $this->actingAs($this->user)->post(route('income-sources.store'), $payload);

		$response->assertSessionHas('success', 'Income Source Created Successfully');
		$response->assertRedirect(route('income-sources.index'));
		
		$this->assertDatabaseHas('income_sources', [
			'name'=>'upwork',
			'fee_percent'=>15,
			'created_by'=>$this->user->id,
			]
		);
	}

	/** @test */
	public function update_income_source()
	{
		$incomeSource = factory(IncomeSource::class)->create(
			[
				'name' => 'upwork',
				'fee_percent' => 10,
			]
		);

		$payload = [
			'name' => 'freelancer',
			'fee_percent'=>5,
		];
		$response = $this->actingAs($this->user)->put(route('income-sources.update', $incomeSource->id), $payload);

		$response->assertSessionHas('success', 'Income Source Updated Successfully');
		$response->assertRedirect(route('income-sources.index'));
		
		$this->assertDatabaseHas('income_sources', [
			'name'=>'freelancer',
			'fee_percent' => 5,
		]);
		
	}

	/** @test */
	public function delete_income_source()
	{
			$incomeSource = factory(IncomeSource::class)->create(
			[
				'name' => 'upwork',
				'fee_percent' => 10,
				'created_by' =>$this->user->id,
			]
		);

		
		$response = $this->actingAs($this->user)->delete(route('income-sources.destroy', $incomeSource->id));

		$response->assertSessionHas('success', 'Income Source Deleted Successfully');
		$response->assertStatus(302);
			
		$this->assertDatabaseHas('income_sources', [
			'name'=>'upwork',
			'fee_percent' => 10,
			'deleted_at' =>now()
		]);
		
	}

	/** @test */
	public function display_income_source()
	{
		$incomeSource = factory(IncomeSource::class)->create();
		
		$response =  $this->actingAs($this->user)->get(route('income-sources.show', $incomeSource->id));

		$response->assertStatus(200);
		$response->assertViewIs('income-sources.show');

		
	}

	/** @test  */
	public function display_a_list_of_income_source()
	{
		factory(IncomeSource::class, 10)->create();
		
		$response = $this->actingAs($this->user)->get(route('income-sources.index'));
		
		$response->assertStatus(200);
		$response->assertViewHas('incomeSources');
		
	}

	
}