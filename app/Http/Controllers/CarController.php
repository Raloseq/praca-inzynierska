<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarModel;
use App\Models\ServiceOrders;
use App\Models\Type;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CarStoreRequest;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::where('user_id', Auth::id())->paginate(5);
        
        return view('cars.index', [
            'cars' => $cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = CarModel::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        $brands = Brand::pluck('name', 'id');

        return view('cars.create',[
            'models' => $models,
            'types' => $types,
            'brands' => $brands
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarStoreRequest $request)
    {
        $car = new Car($request->validated());
        $car->photo = $request->file('photo')->store('cars');
        $car->user_id = Auth::id();
        $car->type = $request->type;
        $car->model = $request->model;
        $car->brand = $request->brand;
        $car->save();
        return redirect()->route('cars.index')->with('status','Pojazd został pomyślnie dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {

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
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {   
        $models = CarModel::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        $brands = Brand::pluck('name', 'id');

        return view('cars.edit',[
            'car' => $car,
            'models' => $models,
            'types' => $types,
            'brands' => $brands
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(CarStoreRequest $request, Car $car)
    {
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
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('status','Pojazd został pomyślnie usunięty!');
    }
}
