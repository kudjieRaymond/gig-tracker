<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Controllers\DocumentController;
use App\Http\Requests\UpdateDocumentRequest;
use App\Project;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Document;

class DocumentControllerTest extends TestCase
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
			$this->get(route('documents.create'))
					->assertRedirect('/login');
			$this->post(route('documents.store'))
					->assertRedirect('/login');
	}

					/** @test */
	public function display_project_creation_form()
	{
		$response = $this->actingAs($this->user)->get(route('documents.create'));
		
		$response->assertStatus(200);
		$response->assertViewIs('documents.create');
	}

		/** @test */
	public function store_validates_using_a_form_request()
	{
		$this->assertActionUsesFormRequest(
			DocumentController::class,
			'store',
			StoreDocumentRequest::class
		);
	}

	/** @test */
	public function update_validates_using_a_form_request()
	{
		$this->assertActionUsesFormRequest(
			DocumentController::class,
			'update',
			UpdateDocumentRequest::class
		);
	}

		/** @test */
	public function store_new_document()
	{
		$project = factory(Project::class)->create();
		
		$payload = [
			'project_id' => $project->id,
			'name' => 'File101',
			'description'=>'this is a file',
			'document_file'=> 'cloud-storage.png'
		];
		
		// Storage::fake('docs');

		//  $file = \Illuminate\Http\Testing\File::image('cloud-storage.png');
		  
		// config()->set('filesystems.disks.docs', [
		// 	'driver' => 'local',
		// 	'root' => Storage::disk('docs')->getAdapter()->getPathPrefix(),
		// ]);	
		// config()->set('medialibrary.disk_name', 'docs');
		
		// Storage::disk('local')->put('/tmp/uploads/cloud-storage.png', $file);

		// Storage::disk('local')->assertExists( 'tmp/uploads/cloud-storage.png');
		
		$response = $this->actingAs($this->user)->post(route('documents.store'),$payload);

		$response->assertStatus(302);

		$response->assertSessionHas('success', 'Document Created Successfully');
		// Assert the file was stored...
    //Storage::disk('docs')->assertExists( '1/' .'cloud-storage.png');

		$response->assertRedirect(route('documents.index'));

    $this->assertDatabaseHas('documents',[
			'project_id' => $project->id,
			'name' => 'File101',
			'description'=>'this is a file',
		]);

	}

		/** @test */
	public function edit_a_document()
	{
		$document = factory(Document::class)->create();
		$project = factory(Project::class)->create();

		$payload = [
			'project_id' => $project->id,
			'name' => 'document 102',
			'description' => 'it describe document 102'
		];
		
		$response = $this->actingAs($this->user)->put(route('documents.update', $document->id), $payload);

		$response->assertStatus(302);

		$response->assertSessionHas('success', 'Document Updated Successfully');

		$response->assertRedirect(route('documents.index'));

    $this->assertDatabaseHas('documents',$payload);
		
	}

				/** @test */
	public function list_all_documents()
	{
		$documents = factory(Document::class, 10)->create();

		$response = $this->actingAs($this->user)->get(route('documents.index'));
		
		$response->assertStatus(200);
		
		$response->assertViewIs('documents.index');
		
		$response->assertViewHas('documents', function($documents){
				return $documents->count() == 10;
			});	
		
	}

	/** @test */
	public function delete_a_note()
	{
		$document = factory(Document::class)->create();
		
		$response = $this->actingAs($this->user)->delete(route('documents.destroy', $document->id));
		
		$response->assertStatus(302);
		$response->assertSessionHas('success', 'Document Deleted Successfully');
		
		$this->assertDatabaseHas('documents', [
				'id'=>$document->id,
				'deleted_at'=> now()
			]);
		

	}

	
}