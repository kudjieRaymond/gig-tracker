<?php

namespace App\Http\Controllers;

use App\IncomeSource;
use Illuminate\Http\Request;
use App\Http\Requests\StoreIncomeSourceRequest;
use App\Http\Requests\UpdateIncomeSourceRequest;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class IncomeSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$incomeSources = IncomeSource::all();
			
			return view('income-sources.index', compact('incomeSources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('income-sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreIncomeSourceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncomeSourceRequest $request)
    {
			 $incomeSource = IncomeSource::create($request->all());
			 
			 	session()->flash('success', 'Income Source Created Successfully');


        return redirect()->route('income-sources.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IncomeSource  $incomeSource
     * @return \Illuminate\Http\Response
     */
    public function show(IncomeSource $incomeSource)
    {
			 
      return view('income-sources.show', compact('incomeSource'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IncomeSource  $incomeSource
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomeSource $incomeSource)
    {
			 
      return view('income-sources.edit', compact('incomeSource'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateIncomeSourceRequest  $request
     * @param  \App\IncomeSource  $incomeSource
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncomeSourceRequest $request, IncomeSource $incomeSource)
    {
			 
			$incomeSource->update($request->all());
			
			session()->flash('success', 'Income Source Updated Successfully');

      return redirect()->route('income-sources.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IncomeSource  $incomeSource
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomeSource $incomeSource)
    {

			$incomeSource->delete();
			
			session()->flash('success', 'Income Source Deleted Successfully');

        return back();
    }
}