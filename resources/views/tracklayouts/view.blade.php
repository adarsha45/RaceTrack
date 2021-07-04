@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection

@if ($tracklayout == null)
    NO TRACK LAYOUT EXISTS
@elseif ($tracklayout != null) <!-- if there is a track to display... -->

@section('contentheading')
    <div class="col-sm-6">
        <h1>TrackLayout - {{$tracklayout->name}}</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li> <!-- link to the home page. -->
            <li class="breadcrumb-item"><a href="{{ route('tracklayouts') }}">Track Layouts</a></li>
            <!-- Link to the tracks page. -->
            <li class="breadcrumb-item active">{{$tracklayout->name}}</li>
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
                    <th>Length</th>
                    <th>Direction Reversed</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <!-- show the columns in the track table that we want to display -->
                    <td>{{$tracklayout->name}}</td>
                    <td>{{$tracklayout->location}}</td>
                    <td>{{$tracklayout->direction_reversed}}</td>
                    <td>
                        <!-- we need to put the delete button in a form with a POST method or it will send a get request, not a delete request -->
                        <form role="form" method="POST" action="{{ route('tracklayouts.destroy', $tracklayout) }}">
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

                            <a href="{{ route('tracklayouts.edit', $tracklayout) }}" class="btn btn-warning"
                               role="button">Edit</a>

                            <!-- button to delete the user. this submits the form. If you look at the form above you will see that the action is
                            Route::delete('/drivers/{driver}/destroy', 'DriverController@destroy')->name('drivers.destroy');
                            and it will add the id of the driver to the wildcard in the endpoint-->
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this track layout?')">Delete
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
