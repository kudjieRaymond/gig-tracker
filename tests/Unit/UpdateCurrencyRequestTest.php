<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Requests\UpdateCurrencyRequest;

class UpdateCurrencyRequestTest extends TestCase
{
   private $subject;
	 
	protected function setUp():void
	{
		parent::setUp();
		
		$this->subject = new UpdateCurrencyRequest();
	}

		public function testRules()
	{
		$this->assertEquals([
			'name' =>  'required',
			'code' =>  'required',
			'main_currency'=>'required'

			], 
			$this->subject->rules()
	
		);
	}

	public function testAuthorize()
	{
		$this->assertTrue($this->subject->authorize());
	}
}