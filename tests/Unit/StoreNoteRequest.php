<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Requests\StoreNoteRequest;

class StoreNoteRequest extends TestCase
{
  private $subject;
	 
	protected function setUp():void
	{
		parent::setUp();
		
		$this->subject = new StoreNoteRequest();
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
