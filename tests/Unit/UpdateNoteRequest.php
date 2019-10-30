<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Requests\UpdateNoteRequest;

class UpdateNoteRequest extends TestCase
{
  private $subject;
	 
	protected function setUp():void
	{
		parent::setUp();
		
		$this->subject = new UpdateNoteRequest();
	}

		public function testRules()
	{
		$this->assertEquals([
			'project_id' => 'required|integer',
      'note_text'  => 'required'
		  ], 
			$this->subject->rules()
	
		);
	}

	public function testAuthorize()
	{
		$this->assertTrue($this->subject->authorize());
	}
}
