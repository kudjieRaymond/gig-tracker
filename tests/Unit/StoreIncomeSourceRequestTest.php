<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Requests\StoreIncomeSourceRequest;

class StoreIncomeSourceRequestTest extends TestCase
{
	private $subject ;

	protected function setUp():void
	{
		parent::setUp();

		$this->subject = new StoreIncomeSourceRequest();

	}

	public function testRules()
	{
		$this->assertEquals([
				'name'=> 'required'
				],
			$this->subject->rules()
		);
	}
	 
	public function testAuthorize()
	{
    $this->assertTrue($this->subject->authorize()) ; 
	}
}