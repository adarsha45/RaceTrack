@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection


@section('contentheading')

    <div class="col-sm-6">
        <h1>Laps</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Laps</li>
        </ol>
    </div>

@endsection

@section('contentbody')


    <!-- button to add a lap -->
    <a class="btn btn-primary" href="{{ route('laps.create') }}" role="button">New Lap</a>

    <br/><br/>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Laps</h3>
        </div>

        <div class="card-body">

            <!-- check to see if we have any lap to display in the variable passed from the view -->
            @if (count($allLaps) == 0)
                NO LAP RECORD NOW
            @elseif (count($allLaps) > 0) <!-- if there are lap to display... -->

            <table id="example1" class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th>Session Number</th>
                    <th>Date Time</th>
                    <th>Lap Time</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <!-- loop through all the laps in the table body -->
                @foreach ($allLaps as $lap)
                    <tr>
                        <!-- show the columns in the lap table that we want to display -->
                        <td>{{$lap->session_number}}</td>
                        <td>{{$lap->date_time}}</td>
                        <td>{{$lap->lap_time}}</td>
                        <td>
                            <!-- form with post method for delete button -->
                            <form role="form" method="POST" action="{{ route('laps.destroy', $lap) }}">
                                <!-- generates a CSRF "token" for each active user session managed by the application - see https://laravel.com/docs/7.x/csrf -->
                            @csrf
                            <!-- override the POST method with a DELETE  -->
                                @method('DELETE')
                                <a href="{{ route('laps.view', $lap) }}" class="btn btn-success"
                                   role="button">View</a>

                                <a href="{{ route('laps.edit', $lap) }}" class="btn btn-warning"
                                   role="button">Edit</a>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this lap?')">Delete</button>
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
