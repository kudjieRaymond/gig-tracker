<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Controllers\NoteController;
use App\Http\Requests\UpdateNoteRequest;
use App\Project;
use App\Note;

class NoteControllerTest extends TestCase
{
   use RefreshDatabase;
	
  	protected $user;
		
		protected function setUp():void 
		{
			parent::setUp();
			
			$this->user = factory(User::class)->create();
		}
		 /** @test */
    function guests_may_not_create_notes()
    {
        $this->get(route('notes.create'))
            ->assertRedirect('/login');
        $this->post(route('notes.store'))
            ->assertRedirect('/login');
		}

					/** @test */
	public function display_project_creation_form()
	{
		$response = $this->actingAs($this->user)->get(route('notes.create'));
		
		$response->assertStatus(200);
		$response->assertViewIs('notes.create');
	}

		/** @test */
	public function store_validates_using_a_form_request()
	{
		$this->assertActionUsesFormRequest(
			NoteController::class,
			'store',
			StoreNoteRequest::class
		);
	}

		/** @test */
	public function store_new_note()
	{
		$project = factory(Project::class)->create();

		$payload = [
			'project_id' => $project->id,
			'note_text' => 'I like this project',
		];
		
		$response = $this->actingAs($this->user)->post(route('notes.store'),$payload);

		$response->assertStatus(302);

		$response->assertSessionHas('success', 'Note Created Successfully');

		$response->assertRedirect(route('notes.index'));

    $this->assertDatabaseHas('notes',$payload);

	}
			/** @test */
	public function update_validates_using_a_form_request()
	{
		$this->assertActionUsesFormRequest(
			NoteController::class,
			'update',
			UpdateNoteRequest::class
		);
	}

	/** @test */
	public function edit_a_note()
	{
		$note = factory(Note::class)->create();
		$project = factory(Project::class)->create();

		$payload = [
			'project_id' => $project->id,
			'note_text' => 'this is an update',
		];
		
		$response = $this->actingAs($this->user)->put(route('notes.update', $note->id), $payload);

		$response->assertStatus(302);

		$response->assertSessionHas('success', 'Note Updated Successfully');

		$response->assertRedirect(route('notes.index'));

    $this->assertDatabaseHas('notes',$payload);
		
	}

			/** @test */
	public function list_all_notes()
	{
		$notes = factory(Note::class, 10)->create();

		$response = $this->actingAs($this->user)->get(route('notes.index'));
		
		$response->assertStatus(200);
		
		$response->assertViewIs('notes.index');
		
		$response->assertViewHas('notes', function($notes){
				return $notes->count() == 10;
			});	
		
	}

	/** @test */
	public function delete_a_note()
	{
		$project = factory(Note::class)->create();
		
		$response = $this->actingAs($this->user)->delete(route('notes.destroy', $project->id));
		
		$response->assertStatus(302);
		$response->assertSessionHas('success', 'Note Deleted Successfully');
		
		$this->assertDatabaseHas('notes', [
				'id'=>$project->id,
				'deleted_at'=> now()
			]);
		

	}

}
