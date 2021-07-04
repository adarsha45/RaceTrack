<?php

namespace App\Http\Controllers;

use App\Track;
use App\TrackLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackLayoutController extends Controller
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
        // get all tracks for that user
        $allTrackids = Track::where('user_id', $id)->orderBy('name', 'asc')->get('id');
        // get track layouts for the user ALEX to fix
        $allTracklayouts = TrackLayout::all();

        return view('tracklayouts.index', compact('allTracklayouts'));
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
        $usersTracks = Track::where('user_id', $id)->get(); // Get all of the Users tracks.
        //dd($usersTracks);
        return view('tracklayouts.create', compact('usersTracks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $tracklayout = new TrackLayout();
        $tracklayout->track_id = $request->input('track_id');
        $tracklayout->name = $request->input('name');
        $tracklayout->length = $request->input('length');
        if ($request->input('directionReversed') == 'true') {
            $tracklayout->direction_reversed = true;
        } else {
            $tracklayout->direction_reversed = false;
        }

        $tracklayout->save();

        return redirect(route('tracklayouts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrackLayout  $tracklayout
     * @return \Illuminate\Http\Response
     */
    public function view(TrackLayout $tracklayout)
    {
        return view('tracklayouts.view', compact('tracklayout'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrackLayout  $trackLayout
     * @return \Illuminate\Http\Response
     */
    public function edit(TrackLayout $tracklayout)
    {
        return view('tracklayouts.edit', compact('tracklayout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrackLayout  $trackLayout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrackLayout $tracklayout)
    {
        $tracklayout->track_id = $request->input('track_id');
        $tracklayout->name = $request->input('name');
        $tracklayout->length = $request->input('length');
        if ($request->input('directionReversed') == 'true') {
            $tracklayout->direction_reversed = true;
        } else {
            $tracklayout->direction_reversed = false;
        }
        $tracklayout->save();

        return redirect(route('tracklayouts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrackLayout  $tracklayout
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrackLayout $tracklayout)
    {
        $tracklayout->delete();

        return redirect(route('tracklayouts'));
    }
}
