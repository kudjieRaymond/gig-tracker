<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\ProjectStatus;
use App\Client;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $projects = Project::all();

    return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			$clients = Client::all()->pluck('first_name', 'id')->prepend('Please select', '');
			
      $statuses = ProjectStatus::all()->pluck('name', 'id')->prepend('Please select', '');

      return view('projects.create', compact('clients', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
			$project = Project::create($request->all());
			
			session()->flash('success', 'Project Created Successfully');

      return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
			 
      $project->load('client', 'status');

      return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {

			$clients = Client::all()->pluck('first_name', 'id')->prepend('Please select', '');
			
			$statuses = ProjectStatus::all()->pluck('name', 'id')->prepend('Please select', '');
			
			$project->load('client', 'status');

      return view('projects.edit', compact('clients', 'statuses', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
			 
			$project->update($request->all());
			
			session()->flash('success', 'Project Updated Successfully');

      return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {

			$project->delete();
			
			session()->flash('success', 'Project Deleted Successfully');

      return back();
    }
}