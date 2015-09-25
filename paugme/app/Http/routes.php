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

use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
    return view('home.home');
});

Route::get('/sign-up', function () {
    return view('home.sign-up');
});

Route::get('/about', function () {
    return view('home.about');
});

Route::get('/contact-us', function () {
    return view('home.contact-us');
});

Route::post('/contact-us', 'ContactController@store');
Route::post('/sign-up', 'SignUpController@store');

Route::get('/contact-thank-you', function () {
    Analytics::trackEvent('conversion', 'contact');
    return view('home.thank-you-contact');
});

Route::get('/sign-up-thank-you', function () {
    Analytics::trackEvent('conversion', 'sign-up');
    return view('home.thank-you-sign-up');
});

Route::get('email/{emailName}', 'EmailController@view');

/*
|------------------------------------------------------
| Resource Routes
|------------------------------------------------------
|
| Routes for images and resources
|
*/
Route::get(rtrim(config('blog.uploads.webpath'), '/') . '/{name}', 'UploadController@index')
->where(['name' => '.*']);

/*
|------------------------------------------------------
| Blog Routes
|------------------------------------------------------
|
| Routes for controlling the blog
|
*/
Route::get('blog', 'BlogController@index');
Route::get('blog/{slug}', 'BlogController@showPost');

/*
|------------------------------------------------------
| Administration Routes
|------------------------------------------------------
|
| Routes for the admin area
|
*/
Route::group([
    'namespace' => 'Admin',
    'middleware' => 'auth',
], function () {
    get('admin', 'AdminController@index');

    resource('admin/post', 'PostController', ['except' => 'show']);

    resource('admin/tag', 'TagController', ['except' => 'show']);
    get('admin/tag/{id}/delete', 'TagController@delete');

    get('admin/upload', 'UploadController@index');
    get('admin/upload/file', 'UploadController@createFile');
    get('admin/upload/file/delete', 'UploadController@deleteFile');
    post('admin/upload/file', 'UploadController@uploadFile');
    delete('admin/upload/file', 'UploadController@destroyFile');
    get('admin/upload/folder', 'UploadController@createFolder');
    get('admin/upload/folder/delete', 'UploadController@deleteFolder');
    post('admin/upload/folder', 'UploadController@uploadFolder');
    delete('admin/upload/folder', 'UploadController@destroyFolder');
});
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');


/*
|------------------------------------------------------
| Test Routes
|------------------------------------------------------
|
| Put volatile routes here. These can come and go in an
| instant, so don't rely on them!
|
*/
Route::get('test/config', function () {
    $redis = Redis::connection();

    $redis->set('name', 'Taylor');

    $name = $redis->get('name');

    dd($name);
});