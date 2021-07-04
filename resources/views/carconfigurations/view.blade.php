@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection

@if ($configuration == null)
    No configuration to display
@elseif ($configuration != null)
    @section('contentheading')
        <div class="col-sm-6">
            <h1>Configuration - '{{$configuration->configuration_name}}'</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('configurations') }}">Configurations</a></li>
                <li class="breadcrumb-item active">{{$configuration->configuration_name}}</li>
            </ol>
        </div>
    @endsection

@section('contentbody')

    <div class="card">
            <div class="card-body">

                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Configuration Data</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="car_id">Car:</label>
                            {{$configuration->car->name}} - {{$configuration->car->make}}, {{$configuration->car->model}}
                        </div>
                        <div class="form-group">
                            <label for="car_id">Configuration Name:</label>
                            {{$configuration->configuration_name}}
                        </div>
                    </div>
                </div>

                {{--ENGINE INFORMATION --}}
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingEngine">
                            <h5 class="mb-0">
                                <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseEngine" aria-expanded="false" aria-controls="collapseOne">
                                    Engine
                                </button>
                            </h5>
                        </div>
                        <div id="collapseEngine" class="collapse" aria-labelledby="headingEngine" data-parent="#accordion">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="power">Power (HP): </label>
                                    {{$configuration->power}}
                                </div>

                                <div class="form-group">
                                    <label for="displacement">Displacement: </label>
                                    {{$configuration->displacement}} Liters
                                </div>

                                <div class="form-group">
                                    <label for="induction_type">Induction Type: </label>
                                    {{$configuration->induction_type}}
                                </div>

                                <div class="form-group">
                                    <label for="fuel_type">Fuel Type: </label>
                                    {{$configuration->fuel_type}}
                                </div>

                                <div class="form-group">
                                    <label for="engine_notes">Other Engine Information: </label>
                                    {{$configuration->engine_notes}}
                                </div>

                                <div class="form-group">
                                    <label for="boost_pressure">Boost Pressure: </label>
                                    {{$configuration->boost_pressure}} PSI
                                </div>
                            </div>
                        </div>
                    </div>


                    {{--TIRE INFORMATION --}}
                    <div class="card">
                        <div class="card-header" id="headingTire">
                            <h5 class="mb-0">
                                <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTire" aria-expanded="false" aria-controls="collapseThree">
                                    Tire Temps and Pressures
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTire" class="collapse" aria-labelledby="headingTire" data-parent="#accordion">
                            <div class="container">
                                <br>
                                <div class="container d-flex align-items-center">
                                    <div class="col-1 d-flex">
                                        <p>Make/Model: </p>
                                    </div>
                                    <div class="col-11 d-flex">
                                        <div class="form-group">
                                            {{$configuration->tire_make_model}}
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="card-header d-flex justify-content-center">
                                                <h3>Front</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-4 align-self-center">
                                            <div class="card-header text-center">
                                                <p>Left</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                        </div>
                                        <div class="col-4">
                                            <div class="card-header text-center">
                                                <p>Right</p>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        {{--  front left--}}
                                        <div class="col-4">
                                            <div class="card-body">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Temperature (&#8451;)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->tire_temperature_front_left}}
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Cold Pressure (PSI)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->cold_pressure_front_left}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Hot Pressure (PSI)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->hot_pressure_front_left}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- front middle --}}
                                        <div class="col-4">

                                        </div>
                                        {{-- front right --}}
                                        <div class="col-4">
                                            <div class="card-body">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Temperature (&#8451;)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->tire_temperature_front_right}}
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Cold Pressure (PSI)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->cold_pressure_front_right}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Hot Pressure (PSI)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->hot_pressure_front_right}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--REAR   --}}

                            <div class="container">
                                <br>
                                <div class="card">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="card-header d-flex justify-content-center">
                                                <h3>Rear</h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4 align-self-center">
                                            <div class="card-header text-center">
                                                <p>Left</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                        </div>
                                        <div class="col-4">
                                            <div class="card-header text-center">
                                                <p>Right</p>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        {{--  rear left--}}
                                        <div class="col-4">
                                            <div class="card-body">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Temperature (&#8451;)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->tire_temperature_rear_left}}
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Cold Pressure (PSI)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->cold_pressure_rear_left}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Hot Pressure (PSI)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->hot_pressure_rear_left}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- rear middle --}}
                                        <div class="col-4">

                                        </div>
                                        {{-- rear right --}}
                                        <div class="col-4">
                                            <div class="card-body">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Temperature (&#8451;)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->tire_temperature_rear_right}}
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Cold Pressure (PSI)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->cold_pressure_rear_right}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Hot Pressure (PSI)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->hot_pressure_rear_right}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


{{-- SUSPENSION AND ALIGNMENT               --}}
                    <div class="card">
                        <div class="card-header" id="headingSuspension">
                            <h5 class="mb-0">
                                <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSuspension" aria-expanded="false" aria-controls="collapseThree">
                                    Suspension / Alignment
                                </button>
                            </h5>
                        </div>
                        <div id="collapseSuspension" class="collapse" aria-labelledby="headingSuspension" data-parent="#accordion">
                            <div class="container">
                                <br>
                                <div class="card">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="card-header d-flex justify-content-center">
                                                <h3>Front</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-4 align-self-center">
                                            <div class="card-header text-center">
                                                <p>Left</p>
                                            </div>
                                        </div>
                                        <div class="col-4">

                                        </div>
                                        <div class="col-4">
                                            <div class="card-header text-center">
                                                <p>Right</p>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        {{--  front left--}}
                                        <div class="col-4">
                                            <div class="card-body">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Ride Height (mm)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->ride_height_front_left}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Spring Rate (kg/mm)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->spring_rate_front_left}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Damper Setting (Clicks out)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->damper_setting_front_left}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Camber (&#186;)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group" >
                                                            {{$configuration->camber_front_left}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- front middle --}}
                                        <div class="col-4">
                                            <div class="card-body">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Toe (mm)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->front_toe}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Anti-Rollbar Diameter (mm)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->rollbar_diameter_front}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Anti-Rollbar Position (Number)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->rollbar_position_front}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Caster (&#186;)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->caster}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- front right --}}
                                        <div class="col-4">
                                            <div class="card-body">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Ride Height (mm)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->ride_height_front_right}}
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Spring Rate (kg/mm)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->spring_rate_front_right}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Damper Setting (Clicks out)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->damper_setting_front_right}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Camber (&#186;)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->camber_front_right}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--REAR   --}}

                            <div class="container">
                                <br>
                                <div class="card">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="card-header d-flex justify-content-center">
                                                <h3>Rear</h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4 align-self-center">
                                            <div class="card-header text-center">
                                                <p>Left</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                        </div>
                                        <div class="col-4">
                                            <div class="card-header text-center">
                                                <p>Right</p>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        {{--  rear left--}}
                                        <div class="col-4">
                                            <div class="card-body">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Ride Height (mm)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->ride_height_rear_left}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Spring Rate (kg/mm)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->spring_rate_rear_left}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Damper Setting (Clicks out)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->damper_setting_rear_left}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Camber (&#186;)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group" >
                                                            {{$configuration->camber_rear_left}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- rear middle --}}
                                        <div class="col-4">
                                            <div class="card-body">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Toe (mm)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group" >
                                                            {{$configuration->rear_toe}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Anti-Rollbar Diameter (mm)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->rollbar_diameter_rear}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Anti-Rollbar Position (Number)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->rollbar_position_rear}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- rear right --}}
                                        <div class="col-4">
                                            <div class="card-body">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Ride Height (mm)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->ride_height_rear_right}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Spring Rate (kg/mm)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->spring_rate_rear_right}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Damper Setting (Clicks out)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            {{$configuration->damper_setting_rear_right}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-6 d-flex justify-content-center">
                                                        <p>Camber (&#186;)</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group" >
                                                            {{$configuration->camber_rear_right}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    {{--BRAKES      --}}
                    <div class="card">
                        <div class="card-header" id="headingBrakes">
                            <h5 class="mb-0">
                                <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseBrakes" aria-expanded="false" aria-controls="collapseThree">
                                    Brakes
                                </button>
                            </h5>
                        </div>
                        <div id="collapseBrakes" class="collapse" aria-labelledby="headingBrakes" data-parent="#accordion">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="brake_bias">Brake Bias: </label>
                                    {{$configuration->brake_bias}}
                                </div>
                            </div>
                        </div>
                    </div>



                    {{--AERO  --}}
                    <div class="card">
                        <div class="card-header" id="headingAero">
                            <h5 class="mb-0">
                                <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseAero" aria-expanded="false" aria-controls="collapseThree">
                                    Aerodynamics
                                </button>
                            </h5>
                        </div>
                        <div id="collapseAero" class="collapse" aria-labelledby="headingAero" data-parent="#accordion">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="wing_front">Front Wing: </label>
                                    {{$configuration->wing_front}}
                                </div>
                                <div class="form-group">
                                    <label for="wing_rear">Rear Wing: </label>
                                    {{$configuration->wing_rear}}
                                </div>
                                <div class="form-group">
                                    <label for="other_aero_notes">Other Aero Information: </label>
                                    {{$configuration->other_aero_notes}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
@endif
@section('javascript')

@endsection
