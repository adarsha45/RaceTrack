<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::post('/home', 'HomeController@graph');

Route::get('/about', function () {
    return view('about');
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/help', function () {
    return view('help');
})->name('help');;

// In the routes below PAY ATTENTION to the restful states i.e. get, put, and delete

// get all drivers and display them
Route::get('/drivers', 'DriverController@index')->name('drivers');

// show a form to create a new driver
Route::get('/drivers/create', 'DriverController@create')->name('drivers.create');

// save the new driver you created in the form above. Notice that this has the same endpoint as
// the first drivers route but it is a POST. We do not need a name for this route as there is no
// view associated with it
Route::post('/drivers', 'DriverController@store');

// view a specific driver
Route::get('/drivers/{driver}/view', 'DriverController@view')->name('drivers.view');

// show a form to edit a driver
Route::get('/drivers/{driver}/edit', 'DriverController@edit')->name('drivers.edit');

// update the driver you just edited in the form above. Once again notice that this has the same endpoint as
// a route above but it is a POST.
Route::put('/drivers/{driver}', 'DriverController@update')->name('drivers.update');

// delete a driver
Route::delete('/drivers/{driver}/destroy', 'DriverController@destroy')->name('drivers.destroy');


//
// Cars Routes
//
// get all cars and display
Route::get('/cars', 'CarController@index')->name('cars');

// post route for the cars route, no view needs to be returned
Route::post('/cars', 'CarController@store');

// show form to create new car
Route::get('/cars/create', 'CarController@create')->name('cars.create');

// delete a car
Route::delete('/cars/{car}/destroy', 'CarController@destroy')->name('cars.destroy');

// edit a car
Route::get('/cars/{car}/edit', 'CarController@edit')->name('cars.edit');

// post route for car edit form
Route::put('/cars/{car}', 'CarController@update')->name('cars.update');

// view a specific car
Route::get('/cars/{car}/view', 'CarController@view')->name('cars.view');

// route for ajax, used to get a car's configurations in a json array.
Route::post('/cars/configurations', 'CarController@configurations')->name('cars.configurations');


//
// Configuration Routes
//
// get all configurations and display
Route::get('/configurations', 'CarConfigurationController@index')->name('configurations');

// post route for the configurations route, no view needs to be returned
Route::post('/configurations', 'CarConfigurationController@store');

// show form to create new configurations
Route::get('/configurations/create/{car?}', 'CarConfigurationController@create')->name('configurations.create');

// delete a configurations
Route::delete('/configurations/{configuration}/destroy', 'CarConfigurationController@destroy')->name('configurations.destroy');

// edit a configurations
Route::get('/configurations/{configuration}/edit', 'CarConfigurationController@edit')->name('configurations.edit');

// post route for configurations edit form
Route::put('/configurations/{configuration}', 'CarConfigurationController@update')->name('configurations.update');

// view a specific configurations
Route::get('/configurations/{configuration}/view', 'CarConfigurationController@view')->name('configurations.view');



//
// Track Routes
//
// get all tracks and display
Route::get('/tracks', 'TrackController@index')->name('tracks');

// post route for the tracks route, no view needs to be returned
Route::post('/tracks', 'TrackController@store');

// show form to create new track
Route::get('/tracks/create', 'TrackController@create')->name('tracks.create');

// delete a track
Route::delete('/tracks/{track}/destroy', 'TrackController@destroy')->name('tracks.destroy');

// edit a track
Route::get('/tracks/{track}/edit', 'TrackController@edit')->name('tracks.edit');

// post route for track edit form
Route::put('/tracks/{track}', 'TrackController@update')->name('tracks.update');

// view a specific track
Route::get('/tracks/{track}/view', 'TrackController@view')->name('tracks.view');

// route for ajax, used to get a track's layouts in a json array.
Route::post('/tracks/layouts', 'TrackController@layouts')->name('tracks.layouts');



//
// Tracklayout Routes
//
// get all tracklayouts and display
Route::get('/tracklayouts', 'TrackLayoutController@index')->name('tracklayouts');

// post route for the tracklayouts route, no view needs to be returned
Route::post('/tracklayouts', 'TrackLayoutController@store');

// show form to create new tracklayouts
Route::get('/tracklayouts/create', 'TrackLayoutController@create')->name('tracklayouts.create');

// delete a tracklayouts
Route::delete('/tracklayouts/{tracklayout}/destroy', 'TrackLayoutController@destroy')->name('tracklayouts.destroy');

// edit a tracklayouts
Route::get('/tracklayouts/{tracklayout}/edit', 'TrackLayoutController@edit')->name('tracklayouts.edit');

// post route for tracklayouts edit form
Route::put('/tracklayouts/{tracklayout}', 'TrackLayoutController@update')->name('tracklayouts.update');

// view a specific tracklayouts
Route::get('/tracklayouts/{tracklayout}/view', 'TrackLayoutController@view')->name('tracklayouts.view');



//
// Lap Routes
//
// get all laps and display
Route::get('/laps', 'LapController@index')->name('laps');

// post route for the laps route, no view needs to be returned
Route::post('/laps', 'LapController@store');

// show form to create new laps
Route::get('/laps/create', 'LapController@create')->name('laps.create');

// delete a laps
Route::delete('/laps/{lap}/destroy', 'LapController@destroy')->name('laps.destroy');

// edit a laps
Route::get('/laps/{lap}/edit', 'LapController@edit')->name('laps.edit');

// post route for laps edit form
Route::put('/laps/{lap}', 'LapController@update')->name('laps.update');

// view a specific laps
Route::get('/laps/{lap}/view', 'LapController@view')->name('laps.view');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//save contact information
Route::resource('contact', 'ContactController');


//to verify the user login
Auth::routes(['verify' => true]);
//set up the middleware for the home
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
//set up the middleware for the user car page
Route::get('/cars', 'CarController@index')->name('cars')->middleware('verified');
//set up the middleware for the user configuration page
Route::get('/configurations', 'CarConfigurationController@index')->name('configurations')->middleware('verified');
//set up the middleware for the user-driver page
Route::get('/drivers', 'DriverController@index')->name('drivers')->middleware('verified');
//set up the middleware for the user tracks page
Route::get('/tracks', 'TrackController@index')->name('tracks')->middleware('verified');
//set up the middleware for the user tracklayouts page
Route::get('/tracklayouts', 'TrackLayoutController@index')->name('tracklayouts')->middleware('verified');




//
// User Routes
//
// get all users and display
Route::get('/users', 'UsersController@index')->name('users');

// post route for the users route, no view needs to be returned
Route::post('/users', 'UsersController@store');

// show form to create new track
Route::get('/users/create', 'UsersController@create')->name('users.create');

// delete a user
Route::delete('/users/{user}/destroy', 'UsersController@destroy')->name('users.destroy');

// edit a user
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');

// post route for user edit form
Route::put('/users/{user}', 'UsersController@update')->name('users.update');

// view a specific user
Route::get('/users/{user}/view', 'UsersController@view')->name('users.view');

//user edit
Route::get('/edit/user', 'UsersController@edits')->name('user.edit');
Route::post('/edit/user', 'UsersController@updates')->name('user.update');

//edit password
Route::get('/edit/password/user', 'UsersController@passwordEdit')->name('password.edit');
Route::post('/edit/password/user', 'UsersController@passwordUpdate')->name('password.update');


