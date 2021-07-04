@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection


@section('contentheading')

    <div class="col-sm-6">
        <h1>New Lap</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li> <!-- link to the home page. -->
            <li class="breadcrumb-item"><a href="{{ route('laps') }}">Laps</a></li>
            <!-- Link to the lap page. -->
            <li class="breadcrumb-item active">New Lap</li>
        </ol>
    </div>

@endsection

@section('contentbody')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add a New Lap</h3>
        </div>

        <!-- post form for the store function within LapController -->
        <form role="form" method="POST" action="{{ route('laps') }}">

            <!-- generates CSRF token -->
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="driver_id">Driver:</label>
                        <select class="form-control" id="driver_id" name="driver_id">
                            @foreach($usersDrivers as $driver){
                                <option value={{$driver->id}}>{{$driver->name}}
                                </option>
                            }
                            @endforeach
                        </select>

                </div>

                <div class="form-group">
                    <label for="track_layout_id">Track Layout:</label>

                    <select class="form-control" id="track_layout_id" name="track_layout_id">

                        @foreach($usersTrackLayouts as $trackLayout){
                        <option value={{$trackLayout->id}}>{{$trackLayout->name}}
                        </option>
                        }
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="car_configuration">Car Configuration:</label>

                    <select class="form-control" id="car_configuration" name="car_configuration">

                        @foreach($usersCarConfigurations as $CarConfiguration){
                        <option value={{$CarConfiguration->id}}>{{$CarConfiguration->configuration_name}}
                        </option>
                        }
                        @endforeach

                    </select>
                </div>



                <div class="form-group">
                    <label for="session_number">Session Number</label>
                    <input type="number" class="form-control" name="session_number" id="session_number" required
                           placeholder="Enter the session number...">
                </div>

                <div class="form-group">
                    <label for="date_time">Date</label>
                    <input type="datetime-local" class="form-control" name="date_time" id="date_time" step="1" required
                           placeholder="Enter the date time...">
                </div>

                <div class="form-group">
                    <label for="lap_time">Lap Time</label>
                    <input type="text" class="form-control" name="lap_time" id="lap_time" required
                           placeholder="hour:min:sec">
                </div>

                <div class="form-group">
                    <label for="air_temperature">Air Temperature</label>
                    <input type="number" class="form-control" name="air_temperature" id="air_temperature" required
                           placeholder="Air Temperature">
                </div>

                <div class="form-group">
                    <label for="track_surface_temperature">Track Surface Temperature</label>
                    <input type="number" class="form-control" name="track_surface_temperature" id="track_surface_temperature" required
                           placeholder="Track Surface Temperature">
                </div>

                <!-- submit the form -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <!-- /.card-body -->
        </form>
    </div>

@endsection

@section('javascript')
    <!-- no extra javascript is required for this page -->
@endsection
