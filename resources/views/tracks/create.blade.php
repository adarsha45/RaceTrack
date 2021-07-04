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
            <li class="breadcrumb-item"><a href="{{ route('tracks') }}">Track</a></li> <!-- Link to the tracks page. -->
            <li class="breadcrumb-item active">New Track</li>
        </ol>
    </div>
@endsection

@section('contentbody')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add a New Track</h3>
        </div>

        <!-- post form for the store function within TrackController -->
        <form role="form" method="POST" action="{{ route('tracks') }}">

            <!-- generates CSRF token -->
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter the track name...">
                </div>

                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" name="location" id="location" placeholder="Enter the track location...">
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
