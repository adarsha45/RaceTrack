@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection


@section('contentheading')
    <div class="col-sm-6">
        <h1>Edit Car</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li> <!-- link to the home page. -->
            <li class="breadcrumb-item"><a href="{{ route('cars') }}">Cars</a></li> <!-- Link to the cars page. -->
            <li class="breadcrumb-item active">Edit Car</li>
        </ol>
    </div>
@endsection

@section('contentbody')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Car</h3>
        </div>

        <!-- post form for the store function within CarController -->
        <form role="form" method="POST" action="{{ route('cars.update', $car) }}">

            <!-- generates CSRF token -->
            @csrf
            <!-- override POST method to use PUT -->
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$car->name}}">
                </div>

                <div class="form-group">
                    <label for="name">Make</label>
                    <input type="text" class="form-control" name="make" id="make" value="{{$car->make}}">
                </div>

                <div class="form-group">
                    <label for="name">Model</label>
                    <input type="text" class="form-control" name="model" id="model" value="{{$car->model}}">
                </div>

                <div class="form-group">
                    <label for="name">Year</label>
                    <input type="number" class="form-control" name="year" id="year" value="{{$car->year}}">
                </div>

                <!-- submit the form -->
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
            <!-- /.card-body -->
        </form>
    </div>

@endsection

@section('javascript')

@endsection
