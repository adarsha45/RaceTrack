@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection


@section('contentheading')
    <div class="col-sm-6">
        <h1>Tracks</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Tracks</li>
        </ol>
    </div>
@endsection

@section('contentbody')

    <!-- button to add a track -->
    <a class="btn btn-primary" href="{{ route('tracks.create') }}" role="button">New Track</a>

    <br><br>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Tracks</h3>
        </div>

        <div class="card-body">
            <!-- check to see if we have any tracks to display in the variable passed from the view -->
            @if (count($allTracks) == 0)
                NO TRACKS REGISTERED
            @elseif (count($allTracks) > 0) <!-- if there are tracks to display... -->
            <table id="example1" class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <!-- loop through all the tracks in the table body -->
                @foreach ($allTracks as $track)
                    <tr>
                        <!-- show the columns in the track table that we want to display -->
                        <td>{{$track->name}}</td>
                        <td>{{$track->location}}</td>
                        <td>
                            <!-- form with post method for delete button -->
                            <form role="form" method="POST" action="{{ route('tracks.destroy', $track) }}" >
                                <!-- generates a CSRF "token" for each active user session managed by the application - see https://laravel.com/docs/7.x/csrf -->
                            @csrf
                            <!-- override the POST method with a DELETE  -->
                            @method('DELETE')

                            <!-- view the track button -->
                                <a href="{{ route('tracks.view', $track) }}" class="btn btn-success"
                                   role="button">View</a>

                            <!-- edit track button -->
                                <a href="{{ route('tracks.edit', $track) }}" class="btn btn-warning"
                                   role="button">Edit</a>

                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this track?')">Delete</button>
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
