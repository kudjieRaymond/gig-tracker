<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Http\Requests\StoreProjectStatusRequest;
use App\Http\Controllers\ProjectStatusController;
use App\Http\Requests\UpdateProjectStatusRequest;
use App\ProjectStatus;

class ProjectStatusControllerTest extends TestCase
{
	use RefreshDatabase;
	
  	protected $user;
		
		protected function setUp():void 
		{
			parent::setUp();
			
			$this->user = factory(User::class)->create();
		}
		 /** @test */
    function guests_may_not_create_project_status()
    {
        $this->get(route('project-statuses.create'))
            ->assertRedirect('/login');
        $this->post(route('project-statuses.store'))
            ->assertRedirect('/login');
		}

		/** @test */
	public function display_project_status_creation_form()
	{
		$response = $this->actingAs($this->user)->get(route('project-statuses.create'));
		
		$response->assertStatus(200);
		$response->assertViewIs('project-statuses.create');
	}

	/** @test */
	public function store_validates_using_a_form_request()
	{
		$this->assertActionUsesFormRequest(
			ProjectStatusController::class,
			'store',
			StoreProjectStatusRequest::class
		);
	}
	
		/** @test */
	public function store_new_project_status()
	{
		$payload = [
			'name'=> 'active',			
		];
		
		$response = $this->actingAs($this->user)->post(route('project-statuses.store'),$payload);

		$response->assertStatus(302);

		$response->assertSessionHas('success', 'Project Status Created Successfully');

		$response->assertRedirect(route('project-statuses.index'));

    $this->assertDatabaseHas('project_statuses',$payload);

	}

	/** @test */
	public function update_validates_using_a_form_request()
	{
		$this->assertActionUsesFormRequest(
			ProjectStatusController::class,
			'update',
			UpdateProjectStatusRequest::class
		);
	}

	

			/** @test */
	public function edit_a_project_status()
	{
		$projectStatus = ProjectStatus::create([
			'name'=>'active'
		]);
		
		$payload = [
			'name'=> 'inactive',			
		];
		
		$response = $this->actingAs($this->user)->put(route('project-statuses.update', $projectStatus->id), $payload);

		$response->assertStatus(302);

		$response->assertSessionHas('success', 'Project Status Updated Successfully');

		$response->assertRedirect(route('project-statuses.index'));

    $this->assertDatabaseHas('project_statuses',$payload);
		
	}

	/** @test */
	public function list_all_project_status()
	{
		$projectStatuses = factory(ProjectStatus::class, 2)->create();

		$myProjectStatus = ProjectStatus::create([
			'name'=>'active',
			'created_by'=>$this->user->id,
		]);

		$response = $this->actingAs($this->user)->get(route('project-statuses.index'));
		
		$response->assertStatus(200);
		
		$response->assertViewIs('project-statuses.index');
		
		$response->assertViewHas('projectStatuses', function($projectStatuses)  use ($myProjectStatus) {
				return $projectStatuses->contains($myProjectStatus) && $projectStatuses->count() == 3;
			});	
		
	}

		/** @test */
	public function delete_a_project_status()
	{
		$projectStatus = ProjectStatus::create(
			[
			'name'=> 'active',
			'created_by' =>$this->user->id,
			]
		);

		$response = $this->actingAs($this->user)->delete(route('project-statuses.destroy', $projectStatus->id));
		
		$response->assertStatus(302);
		$response->assertSessionHas('success', 'Project Status Deleted Successfully');
		
		
		$this->assertDatabaseHas('project_statuses', [
				'id'=>$projectStatus->id,
				'deleted_at'=> now()
			]);
		

	}
}