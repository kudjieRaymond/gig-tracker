<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Controllers\ProjectController;
use App\Http\Requests\UpdateProjectRequest;
use App\Project;
use App\Client;
use App\ProjectStatus;

class ProjectControllerTest extends TestCase
{
   use RefreshDatabase;
	
  	protected $user;
		
		protected function setUp():void 
		{
			parent::setUp();
			
			$this->user = factory(User::class)->create();
		}
		 /** @test */
    function guests_may_not_create_projects()
    {
        $this->get(route('projects.create'))
            ->assertRedirect('/login');
        $this->post(route('projects.store'))
            ->assertRedirect('/login');
		}

			/** @test */
	public function display_project_creation_form()
	{
		$response = $this->actingAs($this->user)->get(route('projects.create'));
		
		$response->assertStatus(200);
		$response->assertViewIs('projects.create');
	}

		/** @test */
	public function store_validates_using_a_form_request()
	{
		$this->assertActionUsesFormRequest(
			ProjectController::class,
			'store',
			StoreProjectRequest::class
		);
	}

		/** @test */
	public function store_new_project()
	{
		$client = factory(Client::class)->create();
		$projectStatus = factory(ProjectStatus::class)->create();

		$payload = [
			'name' => 'Project101',
			'client_id' => $client->id,
			'description' => 'this a  new project',
			'start_date' =>	'2019-08-09',
			'budget' => 20000,
			'status_id' => $projectStatus->id,
		];
		
		$response = $this->actingAs($this->user)->post(route('projects.store'),$payload);

		$response->assertStatus(302);

		$response->assertSessionHas('success', 'Project Created Successfully');

		$response->assertRedirect(route('projects.index'));

    $this->assertDatabaseHas('projects',$payload);

	}

		/** @test */
	public function update_validates_using_a_form_request()
	{
		$this->assertActionUsesFormRequest(
			ProjectController::class,
			'update',
			UpdateProjectRequest::class
		);
	}
  /** @test */
	public function edit_a_project()
	{
		$client = factory(Client::class)->create();
		$projectStatus = factory(ProjectStatus::class)->create();
		$project = factory(Project::class)->create();
				
		$payload = [
			'name' => 'Project102',
			'client_id' => $client->id,
			'description' => 'this is project 102',
			'start_date' =>	'2017-04-10',
			'budget' => 15900,
			'status_id' => $projectStatus->id,
		];
		
		$response = $this->actingAs($this->user)->put(route('projects.update', $projectStatus->id), $payload);

		$response->assertStatus(302);

		$response->assertSessionHas('success', 'Project Updated Successfully');

		$response->assertRedirect(route('projects.index'));

    $this->assertDatabaseHas('projects',$payload);
		
	}

			/** @test */
	public function list_all_projects()
	{
		$projects = factory(Project::class, 10)->create();

		$response = $this->actingAs($this->user)->get(route('projects.index'));
		
		$response->assertStatus(200);
		
		$response->assertViewIs('projects.index');
		
		$response->assertViewHas('projects', function($projects){
				return $projects->count() == 10;
			});	
		
	}

	/** @test */
	public function delete_a_project()
	{
		$project = factory(Project::class)->create();
		
		$response = $this->actingAs($this->user)->delete(route('projects.destroy', $project->id));
		
		$response->assertStatus(302);
		$response->assertSessionHas('success', 'Project Deleted Successfully');
		
		$this->assertDatabaseHas('projects', [
				'id'=>$project->id,
				'deleted_at'=> now()
			]);
		

	}

}