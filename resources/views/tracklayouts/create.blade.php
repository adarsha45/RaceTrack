@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection


@section('contentheading')
    <div class="col-sm-6">
        <h1>New Track Layout</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li> <!-- link to the home page. -->
            <li class="breadcrumb-item"><a href="{{ route('tracklayouts') }}">Track Layouts</a></li>
            <!-- Link to the tracks page. -->
            <li class="breadcrumb-item active">New Track Layout</li>
        </ol>
    </div>
@endsection

@section('contentbody')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add a New Track Layout</h3>
        </div>

        <!-- post form for the store function within TrackController -->
        <form role="form" method="POST" action="{{ route('tracklayouts') }}">

            <!-- generates CSRF token -->
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="track_id">Track:</label>

                    <select class="form-control" id="track_id" name="track_id">
                        @foreach($usersTracks as $track){
                        <option value={{$track->id}}>{{$track->name}} - {{$track->location}}
                        </option>
                        }
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="Enter the track layout name...">
                </div>

                <div class="form-group">
                    <label for="length">Length</label>
                    <input type="number" class="form-control" name="length" id="length" step=".01"
                           placeholder="Enter the track length...">
                </div>

                <div class="form-group">
                    <label for="directionReversed">Is the Direction reversed?</label>
                    <input type="checkbox" class="form-control" name="directionReversed" id="directionReversed"
                           value="true">
                </div>

                <!-- submit the form -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <!-- /.card-body -->
        </form>
    </div>

@endsection

@section('javascript')

@endsection
