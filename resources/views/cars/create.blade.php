@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection


@section('contentheading')
    <div class="col-sm-6">
        <h1>New Car</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li> <!-- link to the home page. -->
            <li class="breadcrumb-item"><a href="{{ route('cars') }}">Cars</a></li> <!-- Link to the cars page. -->
            <li class="breadcrumb-item active">New Car</li>
        </ol>
    </div>
@endsection

@section('contentbody')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add a New Car</h3>
        </div>

        <!-- post form for the store function within CarController -->
        <form role="form" method="POST" action="{{ route('cars') }}">

            <!-- generates CSRF token -->
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your car's nickname...">
                </div>

                <div class="form-group">
                    <label for="name">Make</label>
                    <input type="text" class="form-control" name="make" id="make" placeholder="Enter car make...">
                </div>

                <div class="form-group">
                    <label for="name">Model</label>
                    <input type="text" class="form-control" name="model" id="model" placeholder="Enter car model...">
                </div>

                <div class="form-group">
                    <label for="name">Year</label>
                    <input type="number" class="form-control" name="year" id="year" placeholder="Enter car year...">
                </div>

                <!-- submit the form -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <!-- /.card-body -->
        </form>
    </div>

@endsection

@section('javascript')

@endsection
