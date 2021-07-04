<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * watch https://laracasts.com/series/laravel-6-from-scratch/episodes/21 for an overview of what each function does
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
        $allDrivers = Driver::where('user_id', $id)->orderBy('name', 'asc')->get();

        // pass the allDrivers variable from above to the drivers view and return the drivers view
        return view('drivers.index', compact('allDrivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();

        $driver = new Driver();
        $driver->user_id = $id;
        $driver->name = $request->input('name');
        $driver->weight = $request->input('weight');
        $driver->save();

        return redirect(route('drivers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function view(driver $driver)
    {
        return view('drivers.view', compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(driver $driver)
    {
        return view('drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        $driver->name = $request->input('name');
        $driver->weight = $request->input('weight');
        $driver->save();

        return redirect(route('drivers'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(driver $driver)
    {

        $driver->delete();

        return redirect(route('drivers'));
    }
}
