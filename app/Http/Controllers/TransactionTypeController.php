<?php

namespace App\Http\Controllers;

use App\TransactionType;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransactionTypeRequest;
use App\Http\Requests\UpdateTransactionTypeRequest;

class TransactionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $transactionTypes = TransactionType::all();
			
			return view('transaction-types.index', compact('transactionTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('transaction-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreTransactionTypeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionTypeRequest $request)
    {
			 $transactionType = TransactionType::create($request->all());
			 
			 	session()->flash('success', 'Transaction Type Created Successfully');


        return redirect()->route('transaction-types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransactionType  $transactionType
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionType $transactionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransactionType  $transactionType
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionType $transactionType)
    {
      return view('transaction-types.edit', compact('transactionType'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\UpdateTransactionTypeRequest  $request
     * @param  \App\TransactionType  $transactionType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionTypeRequest $request, TransactionType $transactionType)
    {
			$transactionType->update($request->all());
			
			session()->flash('success', 'Transaction Type Updated Successfully');

      return redirect()->route('transaction-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransactionType  $transactionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionType $transactionType)
    {
			$transactionType->delete();
			
		  session()->flash('success', 'Transaction Type Deleted Successfully');

      return back();
    }
}