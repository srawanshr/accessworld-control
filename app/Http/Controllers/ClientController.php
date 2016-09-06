<?php

namespace App\Http\Controllers;

use App\Models\Client;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;

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

        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();

        $inputs['slug'] = str_slug($inputs['name']);

        DB::transaction(function () use ($inputs, $request) {
            $client = Client::create($inputs);

            $this->uploadRequestImage($request, $client);
        });

        return redirect()->back()->with('success', 'Client added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $inputs = $request->all();

        DB::transaction(function () use ($request, $inputs, $client) {
            $client->update($inputs);

            $this->uploadRequestImage($request, $client);
        });

        return redirect()->back()->with('success', 'Client updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if (!$this->user->can('delete.cms')) return redirect()->route('errors', '401');

        $client->delete();

        return redirect()->back()->with('success', 'Client deleted!');
    }
}
