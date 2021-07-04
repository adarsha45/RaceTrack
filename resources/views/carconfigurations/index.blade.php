@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection


@section('contentheading')
    <div class="col-sm-6">
        <h1>Car Configurations</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Car Configuraton</li>
        </ol>
    </div>
@endsection

@section('contentbody')


    <a class="btn btn-primary" href="{{ route('configurations.create') }}" role="button">New Configuration</a>

    <br><br>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Configurations</h3>
        </div>
            <div class="card-body">
                @if (count($allUsersConfigurations) == 0)
                    No configurations to display.
                @elseif (count($allUsersConfigurations) > 0)

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

                    @foreach ($allUsersConfigurations as $configuration)
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
