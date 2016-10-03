<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Client;
use App\Http\Requests\StoreClient;
use App\Http\Requests\UpdateClient;

use App\Http\Requests;
use Illuminate\Http\Request;

class ClientController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $clients = country()->clients;

        return view('client.index', compact('clients'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * @param StoreClient $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClient $request)
    {
        DB::transaction(function () use ($request)
        {
            $client = country()->Clients()->create($request->data());

            $this->uploadRequestImage($request, $client);
        });

        return redirect()->route('client.index')->withSuccess(trans('messages.create_success', ['entity' => 'Client']));
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
     * @param UpdateClient $request
     * @param  client $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClient $request, Client $client)
    {
        DB::transaction(function () use ($request, $client)
        {
            $client->update($request->data());

            $this->uploadRequestImage($request, $client);
        });

        return redirect()->route('client.index')->withSuccess(trans('messages.update_success', ['entity' => 'Client']));
    }

    /**
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return back()->withSuccess(trans('messages.delete_success', ['entity' => 'Client']));
    }
}
