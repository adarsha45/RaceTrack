@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection


@section('contentheading')

    <!-- using bootstrap columns for layout - https://getbootstrap.com/docs/4.0/layout/grid/ -->
    <div class="col-sm-6">
        <h1>Create Driver</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <!-- notice the names of the routes in the links match the home and drivers routes -->
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('drivers') }}">Drivers</a></li>
            <li class="breadcrumb-item active">Create Driver</li>
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
            <h3 class="card-title">New Driver</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start - notice it is a POST form as we are posting data. The action of the form is the following route:
         Route::post('/drivers', 'DriverController@store');
         This calls the store method of the DriverController to store our new driver -->
        <form role="form" method="POST" action="{{ route('drivers') }}">

            <!-- generates a CSRF "token" for each active user session managed by the application - see https://laravel.com/docs/7.x/csrf -->
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <!-- notice the name and id of the input. The two inputs match the fields in the database for the driver.
                    You must have these so that when we post the data we can get it from the request.
                     -->
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter drivers name...">
                </div>
                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="number" class="form-control" name="weight" id="weight" placeholder="Enter drivers weight...">
                </div>
                <!-- submit the form -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <!-- /.card-body -->
        </form>
    </div>
    <!-- /.card -->



@endsection

@section('javascript')
    <!-- no extra javascript is required for this page -->
@endsection
