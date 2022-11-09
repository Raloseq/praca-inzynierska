<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\ClientAddress;
use App\Models\ServiceOrders;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateClientRequest;
class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('search')) {
            $clients = Clients::where([
                ['surname', 'like', '%' . request('search') . '%'],
                ['user_id', Auth::id()]
                ])->paginate(5);
        } else {
            $clients = Clients::where('user_id', Auth::id())->paginate(5);
        }
        

        return view('clients.index', [
            'clients' => $clients
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $client = new Clients($request->validated());
        $client->user_id = Auth::id();
        $client->save();
        return redirect()->route('clients.index')->with('status','Klient został pomyślnie dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $client)
    {   
        $client_id = $client->id;
        $address = Clients::find($client_id)->client_address;

        $orders = ServiceOrders::with('clients')->get();
        $doneOrders = [];

        foreach($orders as $order) {
            if(($order->is_done === 1) && ($client->id === $order->client_id)) {
                $doneOrders[] = $order;
            }
        }

        return view('clients.show', [
            'client' => $client,
            'address' => $address,
            'doneOrders' => $doneOrders
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $client)
    {
        return view('clients.edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Clients $client)
    {
        $client->fill($request->validated());
        $client->save();

        return redirect()->route('clients.index')->with('status','Dane klienta zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $client)
    {
        try {
            $client->delete();
        } catch(\Illuminate\Database\QueryException $ex) {
            return redirect()->route('clients.index')->with('status','Klient nie może zostać usunięty ponieważ jego dane wystęują w obiegu dokumentów! Skontaktuj się z administratorem.');
        } 
        return redirect()->route('clients.index')->with('status','Klient został pomyślnie usunięty!');
    }
}
