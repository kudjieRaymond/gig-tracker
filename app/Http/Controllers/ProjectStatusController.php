<?php

namespace App\Http\Controllers;

use App\ProjectStatus;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectStatusRequest;
use App\Http\Requests\UpdateProjectStatusRequest;

class ProjectStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $projectStatuses = ProjectStatus::all();
			
			return view('project-statuses.index', compact('projectStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('project-statuses.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreProjectStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectStatusRequest $request)
    {
      $projectStatus = ProjectStatus::create($request->all());
			 
			 	session()->flash('success', 'Project Status Created Successfully');


        return redirect()->route('project-statuses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectStatus  $projectStatus
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectStatus $projectStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectStatus  $projectStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectStatus $projectStatus)
    {
      return view('project-statuses.edit', compact('projectStatus'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateProjectStatusRequest  $request
     * @param  \App\ProjectStatus  $projectStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectStatusRequest $request, ProjectStatus $projectStatus)
    {
			$projectStatus->update($request->all());
			
			session()->flash('success', 'Project Status Updated Successfully');

      return redirect()->route('project-statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectStatus  $projectStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectStatus $projectStatus)
    {
      $projectStatus->delete();
			
		  session()->flash('success', 'Project Status Deleted Successfully');

      return back();
    }
}