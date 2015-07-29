<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home.home');
});

Route::get('/sign-up', function () {
    return view('home.sign-up');
});

Route::get('/about', function () {
    return view('home.about');
});

Route::get('/contact-us', function() {
    return view('home.contact-us');
});

Route::post('/contact-us', 'ContactUsController@postContactUs');