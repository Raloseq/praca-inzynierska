<?php

namespace App\Http\Controllers;

use App\Models\ServiceOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = ServiceOrders::where('user_id', Auth::id())->paginate(5);

        return view('service_orders.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceOrders  $serviceOrders
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceOrders $serviceOrders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceOrders  $serviceOrders
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceOrders $serviceOrders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceOrders  $serviceOrders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceOrders $serviceOrders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceOrders  $serviceOrders
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceOrders $serviceOrders)
    {
        //
    }
}
