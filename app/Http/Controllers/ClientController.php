<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$clients = Client::all();
			
      return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\StoreClientRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
				$client = Client::create($request->all());

				session()->flash('success', 'Client Created Successfully');
				
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {

        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
      return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param   App\Http\Requests\UpdateClientRequest   $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
			$client->update($request->all());

				session()->flash('success', 'Client Updated Successfully');
				
        return redirect()->route('clients.index');
			
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
			$client->delete();

			session()->flash('success', 'Client Deleted Successfully');
				
      return back();
			
    }
}