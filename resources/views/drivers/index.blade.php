@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection


@section('contentheading')

    <!-- using bootstrap columns for layout - https://getbootstrap.com/docs/4.0/layout/grid/ -->
    <div class="col-sm-6">
        <h1>Drivers</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <!-- notice the name of the route in the link matches the home route -->
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Drivers</li>
        </ol>
    </div><!-- /.col -->

@endsection

@section('contentbody')
    <!-- using a button as a link to go to the drivers.create route. The link matches the name of the following route:
    Route::get('/drivers/create', 'DriverController@create')->name('drivers.create');
    this route calls the create function in DriverController  -->
    <a class="btn btn-primary" href="{{ route('drivers.create') }}" role="button">New Driver</a>

    <br><br>


    <!-- using bootstrap cards to lay the page out. A bootstrap card is a flexible and extensible content container,
    see https://getbootstrap.com/docs/4.0/components/card/.
    You can also look at our template documentation https://adminlte.io/docs/3.0/components/cards.html for more examples
     of cards -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Drivers</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <!-- using a blade if statement to see if we have any drivers to show, see
             https://laravel.com/docs/7.x/blade#if-statements -->
            @if (count($allDrivers) == 0)
                NO DRIVERS REGISTERED
            @elseif (count($allDrivers) > 0)
            <!-- yes we have drivers so create a table. I am using the table-bordered and table striped
              styles from bootstrap - https://getbootstrap.com/docs/4.0/content/tables/ -->
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Weight</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- using a blade foreach loop to loop through the drivers - https://laravel.com/docs/7.x/blade#loops -->
                    @foreach ($allDrivers as $driver)
                        <tr>
                            <!-- show the driver name and weight -->
                            <td>{{$driver->name}}</td>
                            <td>{{$driver->weight}}</td>
                            <td>
                                <!-- we need to put the delete button in a form with a POST method or it will send a get request, not a delete request -->
                                <form role="form" method="POST" action="{{ route('drivers.destroy', $driver) }}">
                                <!-- generates a CSRF "token" for each active user session managed by the application - see https://laravel.com/docs/7.x/csrf -->
                                @csrf
                                <!-- override the POST method with a DELETE so we have a delete method. We need to do this as browsers
                                do not support DELETE via 'HTML form' submission -->
                                @method('DELETE')
                                <!-- button to edit the driver. Technically this does not need to be in the form. However I added it here
                                otherwise it would not be inline with the delete button. The link matches the name of the following route:
                                Route::get('/drivers/{driver}/edit', 'DriverController@edit')->name('drivers.edit');
                                this route calls the edit function in DriverController and it will add the id of the driver to the wildcard in the
                                endpoint-->
                                    <a href="{{ route('drivers.view', $driver) }}" class="btn btn-success"
                                       role="button">View</a>

                                    <a href="{{ route('drivers.edit', $driver) }}" class="btn btn-warning"
                                       role="button">Edit</a>

                                    <!-- button to delete the user. this submits the form. If you look at the form above you will see that the action is
                                    Route::delete('/drivers/{driver}/destroy', 'DriverController@destroy')->name('drivers.destroy');
                                    and it will add the id of the driver to the wildcard in the endpoint-->
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this driver?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Weight</th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>

            @endif

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection

@section('javascript')
    // We need this javascript to paginate the tables and make them sortable
    // The adminlte template we are using provides these. If you go to https://adminlte.io/docs/3.0/dependencies.html
    // you will see that one of the dependencies of adiminlte is https://datatables.net/
    // This allows us to add advanced interactions to html tables.
    // Only add this javascript to views that need advanced tables

    <script src="{{ asset("plugins/datatables/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
    <script src="{{ asset("plugins/datatables-responsive/js/dataTables.responsive.min.js") }}"></script>
    <script src="{{ asset("plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });

        });


    </script>


@endsection
