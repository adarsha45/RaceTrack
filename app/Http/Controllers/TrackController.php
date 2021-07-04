<?php

namespace App\Http\Controllers;

use App\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackController extends Controller
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
        $allTracks = Track::where('user_id', $id)->orderBy('name', 'asc')->get();

        // pass the allTracks variable to the tracks view and return the tracks view
        return view('tracks.index', compact('allTracks'));
    }

    //Function to return a json array of a track's layouts.
    public function layouts (Request $request) {
        $selected_track_id = $request->selected_track_id;

        $selected_track_layouts = \App\TrackLayout::where('track_id',$selected_track_id)->get();

        return response()->json([
            'selected_track_layouts' => $selected_track_layouts
        ]);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tracks.create');
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

        $track = new Track();
        $track->user_id = $id;
        $track->name = $request->input('name');
        $track->location = $request->input('location');
        $track->save();

        return redirect(route('tracks'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\track $track
     * @return \Illuminate\Http\Response
     */
    public function view(track $track)
    {
        return view('tracks.view', compact('track'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\track $track
     * @return \Illuminate\Http\Response
     */
    public function edit(track $track)
    {
        return view('tracks.edit', compact('track'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\track $track
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, track $track)
    {
        $track->name = $request->input('name');
        $track->location = $request->input('location');
        $track->save();

        return redirect(route('tracks'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\track $track
     * @return \Illuminate\Http\Response
     */
    public function destroy(track $track)
    {
        $track->delete(); //delete the track
        return redirect(route('tracks')); // back to the main track page
    }
}
