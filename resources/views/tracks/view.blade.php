@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection

@if ($track == null)
    NO TRACK EXISTS
@elseif ($track != null) <!-- if there is a track to display... -->

    @section('contentheading')
        <div class="col-sm-6">
            <h1>Track - {{$track->name}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li> <!-- link to the home page. -->
                <li class="breadcrumb-item"><a href="{{ route('tracks') }}">Tracks</a></li>
                <!-- Link to the tracks page. -->
                  <li class="breadcrumb-item active">{{$track->name}}</li>
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
                        <th>Name</th>
                        <th>Location</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <!-- show the columns in the track table that we want to display -->
                        <td>{{$track->name}}</td>
                        <td>{{$track->location}}</td>
                        <td>
                            <!-- form with post method for delete button -->
                            <form role="form" method="POST" action="{{ route('tracks.destroy', $track) }}">
                                <!-- generates a CSRF "token" for each active user session managed by the application - see https://laravel.com/docs/7.x/csrf -->
                            @csrf
                            <!-- override the POST method with a DELETE  -->
                            @method('DELETE')

                            <!-- edit track button -->
                                <a href="{{ route('tracks.edit', $track) }}" class="btn btn-warning"
                                   role="button">Edit</a>

                                <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this track?')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>


                    </tbody>
                </table>


            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Layouts</h3>
            </div>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">

                    <thead>
                    <tr>
                        <th>Layout Name</th>
                        <th>Length</th>
                        <th>Reversed?</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <!-- show the columns in the track table that we want to display -->
                        <td>Layout name var goes here</td>
                        <td>layout length var goes here</td>
                        <td>layout reversed? var goes here</td>
                        <td>
                            <!-- form with post method for delete button -->
                            <form role="form" method="POST" action="{{ route('tracks.destroy', $track) }}">
                                <!-- generates a CSRF "token" for each active user session managed by the application - see https://laravel.com/docs/7.x/csrf -->
                            @csrf
                            <!-- override the POST method with a DELETE  -->
                            @method('DELETE')

                            <!-- edit track button -->
                                <a href="{{ route('tracks.edit', $track) }}" class="btn btn-warning"
                                   role="button">Edit</a>

                                <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this layout?')">Delete
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
