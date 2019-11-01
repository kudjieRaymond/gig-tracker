<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Requests\UpdateTransactionRequest;

class UpdateTransactionRequestTest extends TestCase
{
  private $subject;
	 
	protected function setUp():void
	{
		parent::setUp();
		
		$this->subject = new UpdateTransactionRequest();
	}

		public function testRules()
	{
		$this->assertEquals([
			'project_id'  => 'required|integer',
			'transaction_type_id' => 'required|integer',
			'income_source_id' => 'required|integer',
			'amount' => 'required',
			'currency_id' =>'required|integer',
			'transaction_date'  => 'required|date',
      ], 
			$this->subject->rules()
	
		);
	}

	public function testAuthorize()
	{
		$this->assertTrue($this->subject->authorize());
	}
}
