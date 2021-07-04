@extends('template.layout')


@section('heading')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('contentheading')
@endsection

@section('contentbody')


            <!-- Line chart -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Lap Times
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-3">


                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">




                                        <form>


                                            <label for="track">Track</label>
                                            <select class="browser-default custom-select" name="track" id="track" required>
                                                <option selected>Select category</option>
                                                @foreach ($usersTracks as $track)
                                                    <option value="{{$track->id}}">{{$track->name}}</option>
                                                @endforeach
                                            </select>

                                            <label for="trackLayout">Layout</label>
                                            <select class="browser-default custom-select" name="trackLayout" id="trackLayout" disabled required>
                                            </select>


                                            <label for="car">Car</label>
                                            <select class="browser-default custom-select" name="car" id="car" required>
                                                <option selected>Select Car</option>
                                                @foreach ($usersCars as $car)
                                                    <option value={{$car->id}}>{{$car->name}} - {{$car->make}}, {{$car->model}}</option>
                                                @endforeach
                                            </select>

                                            <label for="carConfigurations">Configuration</label>
                                            <select class="browser-default custom-select" name="carConfiguration" id="carConfiguration" disabled required>
                                            </select>

                                            <label for="driver_id">Driver</label>
                                            <select class="form-control" id="driverId" name="driverId" required>
                                                @foreach($usersDrivers as $driver){
                                                <option value={{$driver->id}}>{{$driver->name}}</option>
                                                }
                                                @endforeach
                                            </select>
                                            <br>

                                            <button id="graphForm" class="btn btn-primary btn-block">View</button>
                                        </form>



                                    </div>


                                </div>
                            </div>

                        </div>
                        <div class="col-9">
                            <canvas id="chartJSContainer" height="auto"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Line chart -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Recent Activity
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Recently Modified Configurations</h3>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        @if (count($latest5Configurations) == 0 || $latest5Configurations == null)
                                            No configurations to display.
                                        @elseif (count($latest5Configurations) > 0)

                                            <table id="example1" class="table table-bordered table-striped">

                                                <thead>
                                                <tr>
                                                    <th>Car Name</th>
                                                    <th>Configuration Name</th>
                                                    <th>Last Updated</th>
                                                    <th></th>
                                                </tr>
                                                </thead>

                                                <tbody>

                                                @foreach ($latest5Configurations as $configuration)
                                                    <tr>
                                                        <!-- show the columns in the car table that we want to display -->
                                                        <td>{{$configuration->car->name}}</td>
                                                        <td>{{$configuration->configuration_name}}</td>
                                                        <td>{{$configuration->updated_at}}</td>
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
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="card card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Recent Laps</h3>
                                </div>
                                <div class="card-body">
                                    @if (count($latest5Laps) == [])
                                        No recent laps to display.
                                    @elseif (count($latest5Laps) > 0)

                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>Track Name</th>
                                                <th>Layout Name</th>
                                                <th>Car</th>
                                                <th>Configuration</th>
                                                <th>Lap Time</th>
                                                <th></th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            @foreach ($latest5Laps as $lap)
                                                <tr>
                                                    <td>{{$lap->trackLayout->track->name}}</td>
                                                    <td>{{$lap->trackLayout->name}}</td>
                                                    <td>{{$lap->carConfiguration->car->name}}</td>
                                                    <td>{{$lap->carConfiguration->configuration_name}}</td>
                                                    <td>{{$lap->lap_time}}</td>

                                                    <td>
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
                        </div>
                    </div>
                </div>
            </div>

@endsection

@section('javascript')


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        $('#track').on('change',function(e) {
            var selected_track_id = e.target.value;
            $.ajax({
                url:"{{ route('tracks.layouts') }}",
                type:"POST",
                data: {
                    selected_track_id: selected_track_id
                },
                success:function (data) {
                    $('#trackLayout').empty();
                    if (data.selected_track_layouts.length == 0){
                        $('#trackLayout').attr('disabled','disabled')
                    }
                    else {
                        $.each(data.selected_track_layouts, function (index, selected_track_layouts) {
                            $('#trackLayout').append('<option value="' + selected_track_layouts.id + '">' + selected_track_layouts.name + '</option>');
                        })
                        $('#trackLayout').removeAttr('disabled')
                    }
                }
            })
        });


        $('#car').on('change',function(e) {
            var selected_car_id = e.target.value;
            $.ajax({
                url:"{{ route('cars.configurations') }}",
                type:"POST",
                data: {
                    selected_car_id: selected_car_id
                },
                success:function (data) {
                    $('#carConfiguration').empty();
                    if (data.selected_cars_configurations.length == 0){
                        $('#carConfiguration').attr('disabled','disabled')
                    }
                    else {
                        $.each(data.selected_cars_configurations,function(index,selected_cars_configurations){
                            $('#carConfiguration').append('<option value="'+selected_cars_configurations.id+'">'+selected_cars_configurations.configuration_name+'</option>');
                        })
                        $('#carConfiguration').removeAttr('disabled')
                    }
                }
            })
        });
    });
</script>



<script src="{{ asset("plugins/chart.js/Chart.Bundle.js") }}"></script>
{{-- Following is heavily modified from here: https://www.chartjs.org/docs/latest/--}}
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#graphForm').click(function(e){
            e.preventDefault();
            jQuery.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url:"{{ route('home') }}",
                method: 'post',
                data: {
                    track: jQuery('#track').val(),
                    trackLayout: jQuery('#trackLayout').val(),
                    car: jQuery('#car').val(),
                    carConfiguration: jQuery('#carConfiguration').val(),
                    driverId: jQuery('#driverId').val()
                },
                success: function(data){
                    graphData(data)
                },
                // Could do more a better way of communicating the error messages here, but this will do for now.
                error: function (reject) {
                    if( reject.status === 422 ) {
                        alert("Invalid data")
                    }
                }

            });
        });
    });




    function graphData(data){
        console.log(data)
        var laptimeArray1 = null
        laptimeArray1 = data

        var laptimes = null
        laptimes = {
            type: 'line',
            data: {
                datasets: [
                    {
                        label: 'Laptime',
                        data: laptimeArray1,
                        borderColor: '#007bff',
                        fill: false,
                        borderWidth: 2,
                        lineTension: 0
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        type: 'time',
                        scaleLabel: {
                            labelString: 'Lap Time'
                        },
                        time: {
                            parser: 'hh:mm:ss.SSSSSSS',
                            unit: 'seconds',
                            unitStepSize: 5,
                            displayFormats: {
                                'seconds': 'mm:ss.SSSS'
                            }
                        },
                        ticks: {
                            source: 'data',
                            reverse: false
                        },
                    }],
                    xAxes: [{
                        type: 'time',
                        distribution: 'series',
                        ticks: {
                            source: 'data',
                            reverse: false
                        },
                        scaleLabel: {
                            labelString: 'Date'
                        }
                    }]
                }
            }
        }
        var ctx = document.getElementById('chartJSContainer').getContext('2d');
        new Chart(ctx, laptimes);
    }
</script>
@endsection
