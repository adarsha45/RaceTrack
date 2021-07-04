@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection

@if ($lap == null)
    NO LAP EXISTS NOW
@elseif ($lap != null) <!-- if there is a lap to display... -->
@section('contentheading')

    <div class="col-sm-6">
        <h1>Lap Details</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li> <!-- link to the home page. -->
            <li class="breadcrumb-item"><a href="{{ route('laps') }}">Lap</a></li>
            <!-- Link to the lap page. -->
            <li class="breadcrumb-item active">view</li>
        </ol>
    </div>

@endsection

@section('contentbody')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Details</h3>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Driver</th>
                    <th>Track Layout</th>
                    <th>Car Configuration</th>
                    <th>Session Number</th>
                    <th>Date</th>
                    <th>Lap Time</th>
                    <th>Air Temperature</th>
                    <th>Track Surface Temperature</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <!-- show the columns in the lap table that we want to display -->
                    <td>{{$lap->driver->name}}</td>
                    <td>{{$lap->trackLayout->name}}</td>
                    <td>{{$lap->carConfiguration->configuration_name}}</td>
                    <td>{{$lap->session_number}}</td>
                    <td>{{$lap->date_time}}</td>
                    <td>{{$lap->lap_time}}</td>
                    <td>{{$lap->air_temperature}}</td>
                    <td>{{$lap->track_surface_temperature}}</td>
                </tr>


                </tbody>
            </table>
        </div>
    </div>
    </div>

@endsection
@endif

@section('javascript')
    <!-- no extra javascript is required for this page -->
@endsection
