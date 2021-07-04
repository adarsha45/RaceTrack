@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection


@section('contentheading')

    <!-- using bootstrap columns for layout - https://getbootstrap.com/docs/4.0/layout/grid/ -->
    <div class="col-sm-6">
        <h1>Edit Lap</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <!-- notice the names of the routes in the links match the home and drivers routes -->
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('laps') }}">Lap</a></li>
            <li class="breadcrumb-item active">Edit Lap</li>
        </ol>
    </div><!-- /.col -->


@endsection

@section('contentbody')

    <!-- using bootstrap cards to lay the page out. A bootstrap card is a flexible and extensible content container,
    see https://getbootstrap.com/docs/4.0/components/card/.
    You can also look at our template documentation https://adminlte.io/docs/3.0/components/cards.html for more examples
     of cards -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Lap</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start - The action of the form is the following route:
         Route::put('/drivers/{driver}', 'DriverController@update')->name('drivers.update');
         This calls the update method of the DriverController to update our new driver.
         Notice it is a POST form but our route needs a PUT.... -->
        <form role="form" method="POST" action="{{ route('laps.update', $lap) }}">

            <!-- generates a CSRF "token" for each active user session managed by the application - see https://laravel.com/docs/7.x/csrf -->
        @csrf
        <!-- override the POST method with a PUT so we have a put method. We need to do this as browsers
                                do not support PUT via 'HTML form' submission -->
            @method('PUT')
            <div class="card-body">

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

                </form>

                <div class="form-group">
                    <label for="session_number">Session Number</label>
                    <!-- notice the name and id of the input. The two inputs match the fields in the database for the driver.
                    You must have these so that when we put the data we can get it from the request.
                    Also notice that we are pre populating the inputs with the driver information so that we can edit it
                     -->
                    <input type="number" class="form-control" name="session_number" id="session_number" value="{{ $lap->session_number }}">
                </div>

                <div class="form-group">
                    <label for="date_time">Date</label>
                    <!-- notice the name and id of the input. The two inputs match the fields in the database for the driver.
                    You must have these so that when we put the data we can get it from the request.
                    Also notice that we are pre populating the inputs with the driver information so that we can edit it
                     -->
                    <input type="text" class="form-control" name="date_time" id="date_time" value="{{ $lap->date_time }}">
                </div>

                <div class="form-group">
                    <label for="lap_time">Lap Time</label>
                    <!-- notice the name and id of the input. The two inputs match the fields in the database for the driver.
                    You must have these so that when we put the data we can get it from the request.
                    Also notice that we are pre populating the inputs with the driver information so that we can edit it
                     -->
                    <input type="time" class="form-control" name="lap_time" id="lap_time" value="{{ $lap->lap_time }}">
                </div>

                <div class="form-group">
                    <label for="air_temperature">Air Temperature</label>
                    <!-- notice the name and id of the input. The two inputs match the fields in the database for the driver.
                    You must have these so that when we put the data we can get it from the request.
                    Also notice that we are pre populating the inputs with the driver information so that we can edit it
                     -->
                    <input type="number" class="form-control" name="air_temperature" id="air_temperature" value="{{ $lap->air_temperature }}">
                </div>

                <div class="form-group">
                    <label for="track_surface_temperature">Track Surface Temperature</label>
                    <!-- notice the name and id of the input. The two inputs match the fields in the database for the driver.
                    You must have these so that when we put the data we can get it from the request.
                    Also notice that we are pre populating the inputs with the driver information so that we can edit it
                     -->
                    <input type="number" class="form-control" name="track_surface_temperature" id="track_surface_temperature" value="{{ $lap->track_surface_temperature }}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>
            <!-- /.card-body -->
        </form>
    </div>
    <!-- /.card -->




@endsection

@section('javascript')
    <!-- no extra javascript is required for this page -->
@endsection
