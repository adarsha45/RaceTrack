@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection


@section('contentheading')

    <!-- using bootstrap columns for layout - https://getbootstrap.com/docs/4.0/layout/grid/ -->
    <div class="col-sm-6">
        <h1>Edit Driver</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <!-- notice the names of the routes in the links match the home and drivers routes -->
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('drivers') }}">Drivers</a></li>
            <li class="breadcrumb-item active">Edit Driver</li>
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
            <h3 class="card-title">Edit Driver</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start - The action of the form is the following route:
         Route::put('/drivers/{driver}', 'DriverController@update')->name('drivers.update');
         This calls the update method of the DriverController to update our new driver.
         Notice it is a POST form but our route needs a PUT.... -->
        <form role="form" method="POST" action="{{ route('drivers.update', $driver) }}">

            <!-- generates a CSRF "token" for each active user session managed by the application - see https://laravel.com/docs/7.x/csrf -->
            @csrf
        <!-- override the POST method with a PUT so we have a put method. We need to do this as browsers
                                do not support PUT via 'HTML form' submission -->
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <!-- notice the name and id of the input. The two inputs match the fields in the database for the driver.
                    You must have these so that when we put the data we can get it from the request.
                    Also notice that we are pre populating the inputs with the driver information so that we can edit it
                     -->
                    <input type="text" class="form-control" name="name" id="name" value="{{ $driver->name }}">
                </div>
                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="number" class="form-control" name="weight" id="weight" value="{{ $driver->weight }}">
                </div>
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
