<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Requests\UpdateDocumentRequest;

class UpdateDocumentRequestTest extends TestCase
{
    private $subject;
	 
	protected function setUp():void
	{
		parent::setUp();
		
		$this->subject = new UpdateDocumentRequest();
	}

		public function testRules()
	{
		$this->assertEquals([
			 'project_id'    => 'required|integer',
		  ], 
			$this->subject->rules()
	
		);
	}

	public function testAuthorize()
	{
		$this->assertTrue($this->subject->authorize());
	}
}