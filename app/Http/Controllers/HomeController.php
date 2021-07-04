<?php

namespace App\Http\Controllers;

use App\Car;
use App\CarConfiguration;
use App\Lap;
use App\TrackLayout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usersCars = Auth::user()->cars()->get();
        $usersTracks  = Auth::user()->tracks()->get();
        $usersLayouts = TrackLayout::whereIn('track_id',$usersTracks)->get();
        $usersDrivers = Auth::user()->drivers()->get();

        $id = Auth::id();
        $usersCarsIds = Car::where('user_id', $id)->pluck('id'); // Get all of the Users cars. DB query #1.
        $latest5Configurations = CarConfiguration::whereIn('car_id',$usersCarsIds)->orderBy('created_at','desc')->take(5)->get(); // Get all car configurations which have car_id's from the array. DB query #2.

        $latest5Laps = Lap::whereIn('driver_id',$usersDrivers)->orderBy('date_time','desc')->take(5)->get();

        return view('home', compact('usersCars', 'latest5Configurations', 'latest5Laps', 'usersTracks', 'usersLayouts', 'usersDrivers'));
    }

    public function graph(Request $request){

        // validate data. see here: https://laravel.com/docs/8.x/validation
        $request->validate([
            'track' => 'required',
            'trackLayout' => 'required',
            'car' => 'required',
            'carConfiguration' => 'required',
            'driverId' => 'required'
        ]);

        $trackLayout= $request->input('trackLayout');
        $carConfiguration= $request->input('carConfiguration');
        $driverId= $request->input('driverId');

        $lapsQuery = Lap::where('driver_id',$driverId)->where('track_layout_id',$trackLayout)->where('car_configuration',$carConfiguration)->get();

        // Arrange the data in the correct format for the graph
        $laps=[];
        foreach ($lapsQuery as $lap){
            $laps[]= [
                'x'=> $lap->date_time,
                'y'=> $lap->lap_time
            ];
        }

        return $laps;
    }
}
