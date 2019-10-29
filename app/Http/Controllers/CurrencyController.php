<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $currencies = Currency::all();
			
			return view('currencies.index', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('currencies.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreCurrencyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCurrencyRequest $request)
    {
        $currency = Currency::create($request->all());
			 
			 	session()->flash('success', 'Currency Created Successfully');

        return redirect()->route('currencies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
      return view('currencies.show', compact('currency'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
      return view('currencies.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateCurrencyRequest  $request
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCurrencyRequest $request, Currency $currency)
    {
      $currency->update($request->all());
			 
			session()->flash('success', 'Currency Updated Successfully');

      return redirect()->route('currencies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
      $currency->delete();
			
			session()->flash('success', 'Currency Deleted Successfully');

      return back();
    }
}