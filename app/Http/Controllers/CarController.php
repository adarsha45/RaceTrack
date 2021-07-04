<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::id();
        $allCars = Car::where('user_id', $id)->orderBy('name', 'asc')->get();

        // pass the allCars variable to the cars view and return the cars view
        return view('cars.index', compact('allCars'));
    }

    //Function to return a json array of a car's configurations
    public function configurations (Request $request) {
        $selected_car_id = $request->selected_car_id;

        $selected_cars_configurations = \App\CarConfiguration::where('car_id',$selected_car_id)->get();

        return response()->json([
            'selected_cars_configurations' => $selected_cars_configurations
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();

        $car = new Car();
        $car->user_id = $id;
        $car->name = $request->input('name');
        $car->make = $request->input('make');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->save();

        return redirect(route('cars'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\car $car
     * @return \Illuminate\Http\Response
     */
    public function view(car $car)
    {
        $carConfigurations = Auth::user()->cars()->where('id', $car->id)->first()->configurations()->get(); // Get all of the cars configurations.
        return view('cars.view', compact('car', 'carConfigurations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\car $car
     * @return \Illuminate\Http\Response
     */
    public function edit(car $car)
    {
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\car $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, car $car)
    {
        $car->name = $request->input('name');
        $car->make = $request->input('make');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->save();

        return redirect(route('cars'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\car $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(car $car)
    {
        $car->delete(); //delete the car
        return redirect(route('cars')); // back to the main car page
    }
}
