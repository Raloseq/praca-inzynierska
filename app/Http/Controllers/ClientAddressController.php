<?php

namespace App\Http\Controllers;

use App\Models\ClientAddress;
use Illuminate\Http\Request;
use App\Models\Clients;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\ClientAddressStoreRequest;

class ClientAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('client_address.create', [
            'client_id' => app('request')->input('client_id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientAddressStoreRequest $request)
    {

        $client_id = $request->client_id;
        $client_address = new ClientAddress($request->validated());
        $client_address ->save();

        return redirect()->route('clients.show', $client_id)->with('status','Adres klient został pomyślnie dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientAddress  $clientAddress
     * @return \Illuminate\Http\Response
     */
    public function show(ClientAddress $clientAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientAddress  $clientAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientAddress $clientAddress)
    {

        return view('client_address.edit', [
            'client_address' => $clientAddress
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientAddress  $clientAddress
     * @return \Illuminate\Http\Response
     */
    public function update(ClientAddressStoreRequest $request, ClientAddress $clientAddress)
    {

        $client = Clients::find($clientAddress->client_id);
        $clientAddress->fill($request->validated());
        $clientAddress->save();
        
        return redirect()->route('clients.show',$client)->with('status','Dane adresu klienta zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientAddress  $clientAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientAddress $clientAddress)
    {

        $clientAddress->delete();
        return redirect()->back()->with('status','Adres klienta został pomyślnie usunięty!');
    }
}
