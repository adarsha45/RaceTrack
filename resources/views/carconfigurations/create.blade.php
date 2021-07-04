@extends('template.layout')

@section('heading')
    <!-- no extra css is required -->
@endsection


@section('contentheading')
    <div class="col-sm-6">
        <h1>New Configuration</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li> <!-- link to the home page. -->
            <li class="breadcrumb-item"><a href="{{ route('cars') }}">Cars</a></li> <!-- Link to the cars page. -->
            <li class="breadcrumb-item active">New Configuration</li>
        </ol>
    </div>
@endsection

@section('contentbody')


    <div class="card">
        <!-- post form for the store function within CarController -->
        <form role="form" method="POST" action="{{ route('configurations') }}">

            <!-- generates CSRF token -->
            @csrf

            <div class="card-body">

                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Required Fields</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="car_id">Car:</label>
                                @if ($car == null)
                                    <select class="form-control" id="car_id" name="car_id">
                                        @foreach($usersCars as $car){
                                        <option value={{$car->id}}>{{$car->name}} - {{$car->make}}, {{$car->model}}</option>
                                        }
                                        @endforeach
                                    </select>
                                @elseif ($car != null)
                                    <select class="form-control" id="car_id" name="car_id">
                                        <option value={{$car->id}}>{{$car->name}} - {{$car->make}}, {{$car->model}}</option>
                                    </select>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="configuration_name">Configuration Name</label>
                            <input type="text" class="form-control" name="configuration_name" id="configuration_name" placeholder="Required" required>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingEngine">
                        <h6 class="mb-0">
                            Note: The input fields below accept number values up to 999.999. The "Text" fields accept any type of text input.

                        </h6>
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
                                    <label for="power">Power (HP)</label>
                                    <input type="text" class="form-control" name="power" id="power" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="displacement">Displacement (L)</label>
                                    <input type="text" class="form-control" name="displacement" id="displacement" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="induction_type">Induction Type (Text)</label>
                                    <input type="text" class="form-control" name="induction_type" id="induction_type" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="fuel_type">Fuel Type (Text)</label>
                                    <input type="text" class="form-control" name="fuel_type" id="fuel_type" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="engine_notes">Other Engine Information (Text)</label>
                                    <input type="text" class="form-control" name="engine_notes" id="engine_notes" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="boost_pressure">Boost Pressure (PSI)</label>
                                    <input type="text" class="form-control" name="boost_pressure" id="boost_pressure" placeholder="">
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
                                    <div class="col-4 d-flex justify-content-center">
                                        <p>Make/Model (Text)</p>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="tire_make_model" id="tire_make_model" placeholder="">
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
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Temperature (&#8451;)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="tire_temperature_front_left" id="tire_temperature_front_left" placeholder="">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Cold Pressure (PSI)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="cold_pressure_front_left" id="cold_pressure_front_left" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Hot Pressure (PSI)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="hot_pressure_front_left" id="hot_pressure_front_left" placeholder="">
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
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Temperature (&#8451;)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="tire_temperature_front_right" id="tire_temperature_front_right" placeholder="">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Cold Pressure (PSI)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="cold_pressure_front_right" id="cold_pressure_front_right" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Hot Pressure (PSI)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="hot_pressure_front_right" id="hot_pressure_front_right" placeholder="">
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
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Temperature (&#8451;)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="tire_temperature_rear_left" id="tire_temperature_rear_left" placeholder="">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Cold Pressure (PSI)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="cold_pressure_rear_left" id="cold_pressure_rear_left" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Hot Pressure (PSI)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="hot_pressure_rear_left" id="hot_pressure_rear_left" placeholder="">
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
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Temperature (&#8451;)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="tire_temperature_rear_right" id="tire_temperature_rear_right" placeholder="">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Cold Pressure (PSI)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="cold_pressure_rear_right" id="cold_pressure_rear_right" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Hot Pressure (PSI)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="hot_pressure_rear_right" id="hot_pressure_rear_right" placeholder="">
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
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Ride Height (mm)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="ride_height_front_left" id="ride_height_front_left" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Spring Rate (kg/mm)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="spring_rate_front_left" id="spring_rate_front_left" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Damper Setting (Clicks out)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="damper_setting_front_left" id="damper_setting_front_left" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Camber (&#186;)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group" >
                                                            <input type="text" class="form-control" name="camber_front_left" id="camber_front_left" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        {{-- front middle --}}
                                        <div class="col-4">
                                            <div class="card-body">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Toe (mm)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="front_toe" id="front_toe" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Anti-Rollbar Diameter (mm)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="rollbar_diameter_front" id="rollbar_diameter_front" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Anti-Rollbar Position (Number)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="rollbar_position_front" id="rollbar_position_front" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Caster (&#186;)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="caster" id="caster" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        {{-- front right --}}
                                        <div class="col-4">
                                            <div class="card-body">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Ride Height (mm)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="ride_height_front_right" id="ride_height_front_right" placeholder="">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Spring Rate (kg/mm)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="spring_rate_front_right" id="spring_rate_front_right" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Damper Setting (Clicks out)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="damper_setting_front_right" id="damper_setting_front_right" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Camber (&#186;)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="camber_front_right" id="camber_front_right" placeholder="">
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
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Ride Height (mm)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="ride_height_rear_left" id="ride_height_rear_left" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Spring Rate (kg/mm)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="spring_rate_rear_left" id="spring_rate_rear_left" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Damper Setting (Clicks out)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="damper_setting_rear_left" id="damper_setting_rear_left" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Camber (&#186;)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group" >
                                                            <input type="text" class="form-control" name="camber_rear_left" id="camber_rear_left" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    {{-- rear middle --}}
                                        <div class="col-4">
                                            <div class="card-body">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Toe (mm)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group" >
                                                            <input type="text" class="form-control" name="rear_toe" id="rear_toe" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Anti-Rollbar Diameter (mm)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="rollbar_diameter_rear" id="rollbar_diameter_rear" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Anti-Rollbar Position (Number)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="rollbar_position_rear" id="rollbar_position_rear" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    {{-- rear right --}}
                                        <div class="col-4">
                                            <div class="card-body">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Ride Height (mm)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="ride_height_rear_right" id="ride_height_rear_right" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Spring Rate (kg/mm)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="spring_rate_rear_right" id="spring_rate_rear_right" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Damper Setting (Clicks out)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="damper_setting_rear_right" id="damper_setting_rear_right" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-4 d-flex justify-content-center">
                                                        <p>Camber (&#186;)</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group" >
                                                            <input type="text" class="form-control" name="camber_rear_right" id="camber_rear_right" placeholder="">
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
                                    <label for="brake_bias">Brake Bias (Number)</label>
                                    <input type="text" class="form-control" name="brake_bias" id="brake_bias" placeholder="">
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
                                    <label for="wing_front">Front Wing (Text)</label>
                                    <input type="text" class="form-control" name="wing_front" id="wing_front" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="wing_rear">Rear Wing (Text)</label>
                                    <input type="text" class="form-control" name="wing_rear" id="wing_rear" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="other_aero_notes">Other Aero Information (Text)</label>
                                    <input type="text" class="form-control" name="other_aero_notes" id="other_aero_notes" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


{{--SUBMIT BUTTON --}}

                <!-- submit the form -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <!-- /.card-body -->
        </form>
    </div>

@endsection

@section('javascript')

@endsection
