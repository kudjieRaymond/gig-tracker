<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\IncomeSource;
use App\Project;
use App\Currency;

use App\TransactionType;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $transactions = Transaction::all();

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $projects = Project::all()->pluck('name', 'id')->prepend('Please Select', '');

			$transaction_types = TransactionType::all()->pluck('name', 'id')->prepend('Please Select', '');

			$income_sources = IncomeSource::all()->pluck('name', 'id')->prepend('Please Select', '');

			$currencies = Currency::all()->pluck('name', 'id')->prepend('Please Select', '');

			return view('transactions.create', compact('projects', 'transaction_types', 'income_sources', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
			$transaction = Transaction::create($request->all());

			session()->flash('success', 'Transaction Created Successfully');

      return redirect()->route('transactions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
			 
      $transaction->load('project', 'transaction_type', 'income_source', 'currency');

      return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {

       $projects = Project::all()->pluck('name', 'id')->prepend('Please Select', '');

			$transaction_types = TransactionType::all()->pluck('name', 'id')->prepend('Please Select', '');

			$income_sources = IncomeSource::all()->pluck('name', 'id')->prepend('Please Select', '');

			$currencies = Currency::all()->pluck('name', 'id')->prepend('Please Select', '');

			$transaction->load('project', 'transaction_type', 'income_source', 'currency');

        return view('transactions.edit', compact('projects', 'transaction_types', 'income_sources', 'currencies', 'transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
     public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
		
				$transaction->update($request->all());
				
				session()->flash('success', 'Transaction Updated Successfully');

        return redirect()->route('transactions.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {

			 $transaction->delete();
			 
				session()->flash('success', 'Transaction Deleted Successfully');

        return back();
    }
}