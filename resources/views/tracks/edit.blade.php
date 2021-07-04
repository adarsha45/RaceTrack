@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection


@section('contentheading')
    <div class="col-sm-6">
        <h1>Edit Track</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li> <!-- link to the home page. -->
            <li class="breadcrumb-item"><a href="{{ route('tracks') }}">Tracks</a></li> <!-- Link to the tracks page. -->
            <li class="breadcrumb-item active">Edit Track</li>
        </ol>
    </div>
@endsection

@section('contentbody')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Track</h3>
        </div>

        <!-- post form for the store function within TrackController -->
        <form role="form" method="POST" action="{{ route('tracks.update', $track) }}">

        <!-- generates CSRF token -->
        @csrf
        <!-- override POST method to use PUT -->
        @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$track->name}}">
                </div>

                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" name="location" id="location" value="{{$track->location}}">
                </div>
                <!-- submit the form -->
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
            <!-- /.card-body -->
        </form>
    </div>

@endsection

@section('javascript')

@endsection
