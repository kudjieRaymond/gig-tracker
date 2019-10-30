<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Requests\StoreProjectRequest;

class StoreProjectRequestTest extends TestCase
{
      private $subject;
	 
	protected function setUp():void
	{
		parent::setUp();
		
		$this->subject = new StoreProjectRequest();
	}

		public function testRules()
	{
		$this->assertEquals([
			'name'  => 'required',
			'client_id'  => 'required|integer',
			'start_date' =>'date|nullable',
			'status_id' =>'required|integer'
		  ], 
			$this->subject->rules()
	
		);
	}

	public function testAuthorize()
	{
		$this->assertTrue($this->subject->authorize());
	}
}
