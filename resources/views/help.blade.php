@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection


@section('contentheading')
    <!-- using bootstrap columns for layout - https://getbootstrap.com/docs/4.0/layout/grid/ -->
    <div class="col-sm-6">
        <h1>Help</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <!-- notice the name of the route in the link matches the home route -->
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Help</li>
        </ol>
    </div><!-- /.col -->
@endsection


@section('contentbody')
    <div class="card">

        <!-- /.card-header -->
        <div class="card-body">
            <p>Help stuff can go here</p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection


@section('javascript')

@endsection
