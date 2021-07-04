<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarConfiguration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarConfigurationController extends Controller
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
        $usersCarsIds = Car::where('user_id', $id)->pluck('id'); // Get all of the Users cars. DB query #1.
        $allUsersConfigurations = CarConfiguration::whereIn('car_id',$usersCarsIds)->get(); // Get all car configurations which have car_id's from the array. DB query #2.

        // pass the allCars variable to the cars view and return the cars view
        return view('carconfigurations.index', compact('allUsersConfigurations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Car $car = null)
    {
        $usersCars = Auth::user()->cars()->get(); // Get all of the Users cars.
        return view('carconfigurations.create', compact('usersCars', 'car'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $configuration = new CarConfiguration();

        $configuration->car_id = $request->input('car_id');

        $configuration->configuration_name = $request->input('configuration_name');
        $configuration->power = $request->input('power');
        $configuration->displacement = $request->input('displacement');
        $configuration->induction_type = $request->input('induction_type');
        $configuration->fuel_type = $request->input('fuel_type');
        $configuration->engine_notes = $request->input('engine_notes');
        $configuration->boost_pressure = $request->input('boost_pressure');

        $configuration->tire_make_model = $request->input('tire_make_model');

        $configuration->tire_temperature_front_left = $request->input('tire_temperature_front_left');
        $configuration->tire_temperature_front_right = $request->input('tire_temperature_front_right');
        $configuration->tire_temperature_rear_left = $request->input('tire_temperature_rear_left');
        $configuration->tire_temperature_rear_right = $request->input('tire_temperature_rear_right');

        $configuration->cold_pressure_front_left = $request->input('cold_pressure_front_left');
        $configuration->cold_pressure_front_right = $request->input('cold_pressure_front_right');
        $configuration->cold_pressure_rear_left = $request->input('cold_pressure_rear_left');
        $configuration->cold_pressure_rear_right = $request->input('cold_pressure_rear_right');
        $configuration->hot_pressure_front_left = $request->input('hot_pressure_front_left');
        $configuration->hot_pressure_front_right = $request->input('hot_pressure_front_right');
        $configuration->hot_pressure_rear_left = $request->input('hot_pressure_rear_left');
        $configuration->hot_pressure_rear_right = $request->input('hot_pressure_rear_right');

        $configuration->ride_height_front_left = $request->input('ride_height_front_left');
        $configuration->ride_height_front_right = $request->input('ride_height_front_right');
        $configuration->ride_height_rear_left = $request->input('ride_height_rear_left');
        $configuration->ride_height_rear_right = $request->input('ride_height_rear_right');

        $configuration->spring_rate_front_left = $request->input('spring_rate_front_left');
        $configuration->spring_rate_front_right = $request->input('spring_rate_front_right');
        $configuration->spring_rate_rear_left = $request->input('spring_rate_rear_left');
        $configuration->spring_rate_rear_right = $request->input('spring_rate_rear_right');

        $configuration->damper_setting_front_left = $request->input('damper_setting_front_left');
        $configuration->damper_setting_front_right = $request->input('damper_setting_front_right');
        $configuration->damper_setting_rear_left = $request->input('damper_setting_rear_left');
        $configuration->damper_setting_rear_right = $request->input('damper_setting_rear_right');

        $configuration->brake_bias = $request->input('brake_bias');

        $configuration->wing_front = $request->input('wing_front');
        $configuration->wing_rear = $request->input('wing_rear');
        $configuration->other_aero_notes = $request->input('other_aero_notes');

        $configuration->camber_front_left = $request->input('camber_front_left');
        $configuration->camber_front_right = $request->input('camber_front_right');
        $configuration->camber_rear_left = $request->input('camber_rear_left');
        $configuration->camber_rear_right = $request->input('camber_rear_right');
        $configuration->front_toe = $request->input('front_toe');
        $configuration->rear_toe = $request->input('rear_toe');
        $configuration->caster = $request->input('caster');

        $configuration->rollbar_diameter_front = $request->input('rollbar_diameter_front');
        $configuration->rollbar_diameter_rear = $request->input('rollbar_diameter_rear');
        $configuration->rollbar_position_front = $request->input('rollbar_position_front');
        $configuration->rollbar_position_rear = $request->input('rollbar_position_rear');

        $configuration->save();

        return redirect(route('configurations'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarConfiguration  $carConfiguration
     * @return \Illuminate\Http\Response
     */
    public function view(CarConfiguration $configuration)
    {
        return view('carconfigurations.view', compact('configuration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarConfiguration  $carConfiguration
     * @return \Illuminate\Http\Response
     */
    public function edit(CarConfiguration $configuration)
    {
        $usersCars = Auth::user()->cars()->get(); // Get all of the Users cars.
        return view('carconfigurations.edit', compact('configuration', 'usersCars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarConfiguration  $carConfiguration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarConfiguration $configuration)
    {
        $configuration->car_id = $request->input('car_id');

        $configuration->configuration_name = $request->input('configuration_name');
        $configuration->power = $request->input('power');
        $configuration->displacement = $request->input('displacement');
        $configuration->induction_type = $request->input('induction_type');
        $configuration->fuel_type = $request->input('fuel_type');
        $configuration->engine_notes = $request->input('engine_notes');
        $configuration->boost_pressure = $request->input('boost_pressure');

        $configuration->tire_make_model = $request->input('tire_make_model');

        $configuration->tire_temperature_front_left = $request->input('tire_temperature_front_left');
        $configuration->tire_temperature_front_right = $request->input('tire_temperature_front_right');
        $configuration->tire_temperature_rear_left = $request->input('tire_temperature_rear_left');
        $configuration->tire_temperature_rear_right = $request->input('tire_temperature_rear_right');

        $configuration->cold_pressure_front_left = $request->input('cold_pressure_front_left');
        $configuration->cold_pressure_front_right = $request->input('cold_pressure_front_right');
        $configuration->cold_pressure_rear_left = $request->input('cold_pressure_rear_left');
        $configuration->cold_pressure_rear_right = $request->input('cold_pressure_rear_right');
        $configuration->hot_pressure_front_left = $request->input('hot_pressure_front_left');
        $configuration->hot_pressure_front_right = $request->input('hot_pressure_front_right');
        $configuration->hot_pressure_rear_left = $request->input('hot_pressure_rear_left');
        $configuration->hot_pressure_rear_right = $request->input('hot_pressure_rear_right');

        $configuration->ride_height_front_left = $request->input('ride_height_front_left');
        $configuration->ride_height_front_right = $request->input('ride_height_front_right');
        $configuration->ride_height_rear_left = $request->input('ride_height_rear_left');
        $configuration->ride_height_rear_right = $request->input('ride_height_rear_right');

        $configuration->spring_rate_front_left = $request->input('spring_rate_front_left');
        $configuration->spring_rate_front_right = $request->input('spring_rate_front_right');
        $configuration->spring_rate_rear_left = $request->input('spring_rate_rear_left');
        $configuration->spring_rate_rear_right = $request->input('spring_rate_rear_right');

        $configuration->damper_setting_front_left = $request->input('damper_setting_front_left');
        $configuration->damper_setting_front_right = $request->input('damper_setting_front_right');
        $configuration->damper_setting_rear_left = $request->input('damper_setting_rear_left');
        $configuration->damper_setting_rear_right = $request->input('damper_setting_rear_right');

        $configuration->brake_bias = $request->input('brake_bias');

        $configuration->wing_front = $request->input('wing_front');
        $configuration->wing_rear = $request->input('wing_rear');
        $configuration->other_aero_notes = $request->input('other_aero_notes');

        $configuration->camber_front_left = $request->input('camber_front_left');
        $configuration->camber_front_right = $request->input('camber_front_right');
        $configuration->camber_rear_left = $request->input('camber_rear_left');
        $configuration->camber_rear_right = $request->input('camber_rear_right');
        $configuration->front_toe = $request->input('front_toe');
        $configuration->rear_toe = $request->input('rear_toe');
        $configuration->caster = $request->input('caster');

        $configuration->rollbar_diameter_front = $request->input('rollbar_diameter_front');
        $configuration->rollbar_diameter_rear = $request->input('rollbar_diameter_rear');
        $configuration->rollbar_position_front = $request->input('rollbar_position_front');
        $configuration->rollbar_position_rear = $request->input('rollbar_position_rear');

        $configuration->save();

        return redirect(route('configurations'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarConfiguration  $carConfiguration
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarConfiguration $configuration)
    {
        $configuration->delete(); //delete the car
        return redirect(route('configurations')); // back to the main car page
    }
}
