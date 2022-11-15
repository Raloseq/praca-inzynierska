<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarModel;
use App\Models\ServiceOrders;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\UpdateCarRequest;
use Illuminate\Support\Facades\Gate;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        if (request('search')) {
            $cars = Car::where([
                ['registration_number', 'like', '%' . request('search') . '%'],
                ['user_id', Auth::id()]
                ])->paginate(5);
        } else {
            $cars = Car::where('user_id', Auth::id())->paginate(5);
        }


        return view('cars.index', [
            'cars' => $cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $models = CarModel::pluck('name', 'id');
        $types = Type::pluck('name', 'id');

        return view('cars.create',[
            'models' => $models,
            'types' => $types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CarStoreRequest $request)
    {
        $car = new Car($request->validated());
        $car->photo = $request->file('photo')->store('cars');
        $car->user_id = Auth::id();
        $car->type = $request->type;
        $car->model = $request->model;
        $car->save();
        return redirect()->route('cars.index')->with('status','Pojazd został pomyślnie dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Car $car)
    {
        Gate::authorize('view', $car);

        $orders = ServiceOrders::with('cars')->get();
        $doneOrders = [];

        foreach($orders as $order) {
            if(($order->is_done === 1) && ($car->id === $order->car_id)) {
                $doneOrders[] = $order;
            }
        }

        return view('cars.show', [
            'car' => $car,
            'doneOrders' => $doneOrders
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Car $car)
    {
        Gate::authorize('update', $car);

        $models = CarModel::pluck('name', 'id');
        $types = Type::pluck('name', 'id');

        return view('cars.edit',[
            'car' => $car,
            'models' => $models,
            'types' => $types,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        Gate::authorize('update', $car);

        $car->fill($request->validated());
        if($request->hasFile('photo')) {
            $car->photo = $request->file('photo')->store('cars');
        }
        $car->save();

        return redirect()->route('cars.index')->with('status','Dane pojazdu zostały zaktualizowane!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Car $car)
    {
        Gate::authorize('delete', $car);

        try {
            $car->delete();
        } catch(\Illuminate\Database\QueryException $ex) {
            return redirect()->route('cars.index')->with('status','Pojazd nie może zostać usunięty ponieważ jego
            dane wystęują w obiegu dokumentów! Skontaktuj się z administratorem.');
        }

        return redirect()->route('cars.index')->with('status','Pojazd został pomyślnie usunięty!');
    }
}
