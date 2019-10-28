<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Requests\UpdateClientRequest;

class UpdateClientRequestTest extends TestCase
{
    private $subject;
	
	protected function setUp():void
	{
		parent::setUp();

		$this->subject = new UpdateClientRequest();
	} 

	public function testRules()
	{
		$this->assertEquals([
			'first_name'=> 'required|max:255',
			'last_name'=> 'required|max:255',
			'email'=>'required|email',
			'phone'=>'nullable',
			'website'=>'nullable|url',
			'status'=>'required|string',
			'status'=>'nullable|string',
			'country'=>'nullable|string',
			'skype'=>'nullable|string'

			], 
			$this->subject->rules()
	
		);
	}

	
	public function testAuthorize()
	{
		$this->assertTrue($this->subject->authorize());
	}
}