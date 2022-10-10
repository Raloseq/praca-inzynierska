<?php

namespace App\Http\Controllers;

use App\Models\ServiceOrders;
use App\Models\Clients;
use App\Models\Employee;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ServiceOrderStoreRequest;

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
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Clients::where('user_id', Auth::id())->get();
        $cars = Car::where('user_id', Auth::id())->get();
        $employees = Employee::where('user_id', Auth::id())->get();

        return view('service_orders.create', [
            'clients' => $clients,
            'employees' => $employees,
            'cars' => $cars
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceOrderStoreRequest $request)
    {
        $service_order = new ServiceOrders($request->validated());
        $service_order->user_id = Auth::id();
        $service_order->save();
        return redirect()->route('service_orders.index')->with('status','Zlecenie zostało pomyślnie dodane!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceOrders  $serviceOrders
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceOrders $serviceOrder)
    {
        return view('service_orders.show', [
            'order' => $serviceOrder
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceOrders  $serviceOrders
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceOrders $serviceOrder)
    {
        $clients = Clients::where('user_id', Auth::id())->get();
        $cars = Car::where('user_id', Auth::id())->get();
        $employees = Employee::where('user_id', Auth::id())->get();

        // $client = Clients::where('id',$serviceOrder->client_id)->get();
        // $car = Car::where('id',$serviceOrder->car_id)->get();
        // $employee = Employee::where('id',$serviceOrder->employee_id)->get();

        return view('service_orders.edit', [
            'order' => $serviceOrder,
            'clients' => $clients,
            'employees' => $employees,
            'cars' => $cars
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceOrders  $serviceOrders
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceOrderStoreRequest $request, ServiceOrders $serviceOrder)
    {
        $serviceOrder->fill($request->validated());
        $serviceOrder->save();

        return redirect()->route('service_orders.index')->with('status','Dane zlecenia zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceOrders  $serviceOrders
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceOrders $serviceOrder)
    {
        $serviceOrder->delete();
        return redirect()->route('service_orders.index')->with('status','Zlecenie zostało pomyślnie usunięte!');
    }
}
