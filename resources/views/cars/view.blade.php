@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection

@if ($car == null)
    NO CAR EXISTS
@elseif ($car != null) <!-- if there is a car to display... -->
    @section('contentheading')
        <div class="col-sm-6">
            <h1>Car - {{$car->name}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li> <!-- link to the home page. -->
                <li class="breadcrumb-item"><a href="{{ route('cars') }}">Cars</a></li> <!-- Link to the cars page. -->
                <li class="breadcrumb-item active">{{$car->name}}</li>
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
                        <th>Car Name</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    <!-- loop through all the cars in the table body -->
                    <tr>
                        <!-- show the columns in the car table that we want to display -->
                        <td>{{$car->name}}</td>
                        <td>{{$car->make}}</td>
                        <td>{{$car->model}}</td>
                        <td>{{$car->year}}</td>
                        <td>
                            <!-- form with post method for delete button -->
                            <form role="form" method="POST" action="{{ route('cars.destroy', $car) }}">
                                <!-- generates a CSRF "token" for each active user session managed by the application - see https://laravel.com/docs/7.x/csrf -->
                            @csrf
                            <!-- override the POST method with a DELETE  -->
                            @method('DELETE')

                            <!-- edit car button -->
                                <a href="{{ route('cars.edit', $car) }}" class="btn btn-warning"
                                   role="button">Edit</a>


                                <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this car?')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>


            </div>
        </div>

        <br>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Configurations</h3>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Configuration Name</th>
                        <th>Last Updated</th>
                        <th>Car Name</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    <!-- loop through all the cars in the table body -->

                            @foreach($carConfigurations as $configuration)
                            <tr>
                                <!-- show the columns in the car table that we want to display -->
                                <td>{{$configuration->configuration_name}}</td>
                                <td>{{$configuration->updated_at}}</td>
                                <td>{{$configuration->car->name}}</td>
                                <td>{{$configuration->car->make}}</td>
                                <td>{{$configuration->car->model}}</td>
                                <td>
                                    <!-- form with post method for delete button -->
                                    <form role="form" method="POST" action="{{ route('configurations.destroy', $configuration) }}" >
                                        <!-- generates a CSRF "token" for each active user session managed by the application - see https://laravel.com/docs/7.x/csrf -->
                                    @csrf
                                    <!-- override the POST method with a DELETE  -->
                                        @method('DELETE')

                                        <a href="{{ route('configurations.view', $configuration) }}" class="btn btn-success"
                                           role="button">View</a>

                                        <a href="{{ route('configurations.edit', $configuration) }}" class="btn btn-warning"
                                           role="button">Edit</a>

                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this configuration?')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        <tr>
                            <!-- show the columns in the car table that we want to display -->

                            <td>
                                <!-- form with post method for delete button -->
                                <form role="form" method="GET" action="{{ route('configurations.create', $car) }}" >
                                    <!-- generates a CSRF "token" for each active user session managed by the application - see https://laravel.com/docs/7.x/csrf -->
                                    @csrf

                                    <button type="submit" class="btn btn-primary" >Add Configuration</button>
                                </form>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <br>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Latest Laps</h3>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">

                    <thead>
                    <tr>
                        <th>Lap ID</th>
                        <th>Track Name</th>
                        <th>Lap Time</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    <!-- loop through all the cars in the table body -->
                    <tr>
                        <!-- show the columns in the car table that we want to display -->
                        <td>Lap ID Number?</td>
                        <td>Track name</td>
                        <td>Lap Time</td>
                        <td>
                            <!-- form with post method for delete button -->


                            <!-- THE ROUTE FOR DELETING THE CONFIGURATION NEEDS TO BE ADDED TO THIS FORMS ACTION -->
                            <form role="form" method="POST" action="">
                                <!-- generates a CSRF "token" for each active user session managed by the application - see https://laravel.com/docs/7.x/csrf -->
                            @csrf
                            <!-- override the POST method with a DELETE  -->
                            @method('DELETE')

                            <!-- edit car button -->

                                <!-- THE ROUTE FOR VIEWING THE LAP NEEDS TO BE ADDED TO THIS BUTTONS HREF -->
                                <a href="/" class="btn btn-success"
                                   role="button">View</a>

                                <!-- THE ROUTE FOR EDITING THE LAP NEEDS TO BE ADDED TO THIS BUTTONS HREF -->
                                <a href="/" class="btn btn-warning"
                                   role="button">Edit</a>


                                <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this lap?')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
@endif

@section('javascript')

@endsection
