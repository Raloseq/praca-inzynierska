<?php

namespace App\Http\Controllers;

use App\Models\ServiceOrders;
use App\Models\Clients;
use App\Models\Employee;
use App\Models\Car;
use App\Models\OrdersTimetable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ServiceOrderStoreRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class ServiceOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('search')) {
            $orders = ServiceOrders::where([
                ['description', 'like', '%' . request('search') . '%'],
                ['user_id', Auth::id()]
                ])->paginate(5);
        } else {
            $orders = ServiceOrders::where('user_id', Auth::id())->paginate(5);
        }


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
        $service_order->damage_photo = $request->file('damage_photo')->store('public');
        $event = OrdersTimetable::create([
            'title' => $request->description,
            'start' => $request->admission_date,
            'end' => $request->end_date,
            'user_id' => Auth::id()
        ]);
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
        Gate::authorize('view', $serviceOrder);

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
        Gate::authorize('update', $serviceOrder);

        $clients = Clients::where('user_id', Auth::id())->get();
        $cars = Car::where('user_id', Auth::id())->get();
        $employees = Employee::where('user_id', Auth::id())->get();

        $orders = OrdersTimetable::where('user_id', Auth::id())->get();

        foreach($orders as $order) {
            if($order->end === $serviceOrder->end_date) {
                $order_calendar = $order;
            }
        }

        return view('service_orders.edit', [
            'order' => $serviceOrder,
            'clients' => $clients,
            'employees' => $employees,
            'cars' => $cars,
            'order_calendar' => $order_calendar
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
        Gate::authorize('update', $serviceOrder);

        $data = $request->validated();

        if($request->is_done === 'on') {
            $data['is_done'] = 1;

            // $basic  = new \Vonage\Client\Credentials\Basic("3cd76013", env('NEXMO_SECRET'));
            // $client = new \Vonage\Client($basic);

            // $response = $client->sms()->send(
            //     new \Vonage\SMS\Message\SMS("505952848", 'Rafal Brzezinski', 'Twoje zlecenie warsztatowe własnie dobiegło końca możesz odebrać swój samochód. Zlecenie:' . $request->description)
            // );

            // $message = $response->current();

        } else {
            $data['is_done'] = 0;
        }

        if($request->hasFile('damage_photo')) {
            $serviceOrder->damage_photo = $request->file('damage_photo')->store('public');
        }



        $serviceOrder->fill($data);
        $serviceOrder->save();

        $order = OrdersTimetable::find($request->order_calendar)->update([
            'title' => $request->description,
            'start' => $request->admission_date,
            'end' => $request->end_date,
        ]);

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
        Gate::authorize('delete', $serviceOrder);

        $this->deleteOrderTimetable($serviceOrder);
        $serviceOrder->delete();

        return redirect()->route('service_orders.index')->with('status','Zlecenie zostało pomyślnie usunięte!');
    }


    public function deleteOrderTimetable(ServiceOrders $serviceOrder)
    {
        $orders = OrdersTimetable::where('user_id', Auth::id())->get();

        foreach($orders as $order) {
            if($order->end === $serviceOrder->end_date) {
                $order_calendar = $order;
            }
        }

        OrdersTimetable::find($order_calendar->id)->delete();
    }
}
