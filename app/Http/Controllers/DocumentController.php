<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Project;
use App\Traits\MediaUploadingTrait;

class DocumentController extends Controller
{
	use MediaUploadingTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $documents = Document::all();

        return view('documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $projects = Project::all()->pluck('name', 'id')->prepend(trans('Please Select'), '');

        return view('documents.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreDocumentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentRequest $request)
    {
			$document = Document::create($request->all());
			
			if($request->input('document_file', false)){
				try{
					$document->addMedia(storage_path('tmp/uploads/' . $request->input('document_file')))->toMediaCollection('document_file');
				}catch(\Exception $e){
					
				}
				
			}

			session()->flash('success', 'Document Created Successfully');

			return redirect()->route('documents.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
      $document->load('project');

        return view('documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $projects = Project::all()->pluck('name', 'id')->prepend('Please Select', '');

        $document->load('project');

        return view('documents.edit', compact('projects', 'document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateDocumentRequest  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
			 $document->update($request->all());
			 
			 if ($request->input('document_file', false)) {
            if (!$document->document_file || $request->input('document_file') !== $document->document_file->file_name) {
                $document->addMedia(storage_path('tmp/uploads/' . $request->input('document_file')))->toMediaCollection('document_file');
            }
        } elseif ($document->document_file) {
            $document->document_file->delete();
				}
				
			 session()->flash('success', 'Document Updated Successfully');

			return redirect()->route('documents.index');
			 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
			 $document->delete();
			 
			 session()->flash('success', 'Document Deleted Successfully');

        return back();
    }
}