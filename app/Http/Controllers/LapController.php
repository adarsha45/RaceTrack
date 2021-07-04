<?php

namespace App\Http\Controllers;

use App\CarConfiguration;
use App\Driver;
use App\Track;
use App\Lap;
use App\TrackLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LapController extends Controller
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
        // get the user id
        $id = Auth::id();

        $usersDrivers = Driver::where('user_id', $id)->get(); // Get all of the Users tracks.
        // dd($usersDrivers);
        $usersTrackLayouts = TrackLayout::where('track_id', $id)->get(); // Get all of the Users tracks.
        // dd(usersTrackLayouts)
        $usersCarConfigurations = CarConfiguration::where('car_id', $id)->get(); // Get all of the Users configurations.
        // dd($usersCarConfigurations);

        $allLaps = Lap::whereIn('driver_id',$usersDrivers)->get();


        return view('laps.index',compact('allLaps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::id();
        // dd($id);
        $usersDrivers = Driver::where('user_id', $id)->get(); // Get all of the Drivers.
        // dd($usersDrivers);
        $usersTrackLayouts = TrackLayout::where('track_id', $id)->get(); // Get all of the TrackLayouts.
        // dd(usersTrackLayouts)
        $usersCarConfigurations = CarConfiguration::where('car_id', $id)->get(); // Get all of the CarConfigurations.
        // dd($usersCarConfigurations);

        return view('laps.create', compact('usersDrivers', 'usersCarConfigurations', 'usersTrackLayouts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $lap = new Lap();
        $lap->driver_id = $request->input('driver_id');
        $lap->track_layout_id = $request->input('track_layout_id');
        $lap->car_configuration = $request->input('car_configuration');

        $lap->session_number = $request->input('session_number');
        $lap->date_time = $request->input('date_time');
        $lap->lap_time = $request->input('lap_time');
        $lap->air_temperature = $request->input('air_temperature');
        $lap->track_surface_temperature = $request->input('track_surface_temperature');

        $lap->save();

        return redirect(route('laps'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrackLayout  $tracklayout
     * @return \Illuminate\Http\Response
     */
    public function view(Lap $lap)
    {
        $id = Auth::id();
        $usersDrivers = Driver::where('user_id', $id)->get(); // Get all of the Users tracks.
        // dd($usersDrivers);
        $usersTrackLayouts = TrackLayout::where('track_id', $id)->get(); // Get all of the Users tracks.
        // dd(usersTrackLayouts)
        $usersCarConfigurations = CarConfiguration::where('car_id', $id)->get(); // Get all of the Users configurations.
        // dd($usersCarConfigurations);

        return view('laps.view', compact('lap','usersDrivers','usersTrackLayouts','usersCarConfigurations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrackLayout  $trackLayout
     * @return \Illuminate\Http\Response
     */
    public function edit(Lap $lap)
    {
        $id = Auth::id();
        $usersDrivers = Driver::where('user_id', $id)->get(); // Get all of the Users tracks.
        // dd($usersDrivers);
        $usersTrackLayouts = TrackLayout::where('track_id', $id)->get(); // Get all of the Users tracks.
        // dd(usersTrackLayouts)
        $usersCarConfigurations = CarConfiguration::where('car_id', $id)->get(); // Get all of the Users configurations.
        // dd($usersCarConfigurations);

        return view('laps.edit', compact('lap','usersDrivers','usersTrackLayouts','usersCarConfigurations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrackLayout  $trackLayout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lap $lap)
    {
        $lap->driver_id = $request->input('driver_id');
        $lap->track_layout_id = $request->input('track_layout_id');
        $lap->car_configuration = $request->input('car_configuration');


        $lap->session_number = $request->input('session_number');
        $lap->date_time = $request->input('date_time');
        $lap->lap_time = $request->input('lap_time');
        $lap->air_temperature = $request->input('air_temperature');
        $lap->track_surface_temperature = $request->input('track_surface_temperature');

        $lap->save();

        return redirect(route('laps'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrackLayout  $tracklayout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lap $lap)
    {
        $lap->delete();

        return redirect(route('laps'));
    }
}
