@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection


@section('contentheading')
    <div class="col-sm-6">
        <h1>Cars</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Cars</li>
        </ol>
    </div>
@endsection

@section('contentbody')

    <!-- button to add a car -->
    <a class="btn btn-primary" href="{{ route('cars.create') }}" role="button">New Car</a>

    <br><br>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Cars</h3>
        </div>

        <div class="card-body">
            <!-- check to see if we have any cars to display in the variable passed from the view -->
            @if (count($allCars) == 0)
                NO CARS REGISTERED
            @elseif (count($allCars) > 0) <!-- if there are cars to display... -->
            <table id="example1" class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th>Name</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <!-- loop through all the cars in the table body -->
                @foreach ($allCars as $car)
                    <tr>
                        <!-- show the columns in the car table that we want to display -->
                        <td>{{$car->name}}</td>
                        <td>{{$car->make}}</td>
                        <td>{{$car->model}}</td>
                        <td>{{$car->year}}</td>
                        <td>
                            <!-- form with post method for delete button -->
                            <form role="form" method="POST" action="{{ route('cars.destroy', $car) }}" >
                                <!-- generates a CSRF "token" for each active user session managed by the application - see https://laravel.com/docs/7.x/csrf -->
                            @csrf
                            <!-- override the POST method with a DELETE  -->
                            @method('DELETE')

                            <!-- view the car button -->
                            <a href="{{ route('cars.view', $car) }}" class="btn btn-success"
                                   role="button">View</a>

                            <!-- edit car button -->
                                <a href="{{ route('cars.edit', $car) }}" class="btn btn-warning"
                                   role="button">Edit</a>



                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this car?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            @endif

        </div>
    </div>

@endsection

@section('javascript')
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
