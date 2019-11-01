<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Project;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $notes = Note::all();

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $projects = Project::all()->pluck('name', 'id')->prepend('Please Select', '');

        return view('notes.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreNoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoteRequest $request)
    {
			$note = Note::create($request->all());
			
			session()->flash('success', 'Note Created Successfully');

        return redirect()->route('notes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
	
      $note->load('project');

        return view('notes.show', compact( 'note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
			 
			$projects = Project::all()->pluck('name', 'id')->prepend('Please Select', '');
			
      $note->load('project');

      return view('notes.edit', compact('projects', 'note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateNoteRequest $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {

			$note->update($request->all());
			
			session()->flash('success', 'Note Updated Successfully');

      return redirect()->route('notes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
			 
			$note->delete();
			
			session()->flash('success', 'Note Deleted Successfully');

      return back();
    }
}