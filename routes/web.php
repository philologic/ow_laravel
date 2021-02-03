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

Route::pattern('id', '\d+');

Route::get('auth/login', 'LoginController@getLogin');
Route::post('auth/login', 'LoginController@postLogin');
Route::get('auth/logout', 'LoginController@authenticate');

Route::get('/', 'PostController@index');

Route::get('post/{id}', [
	'uses' => 'PostController@show'
]);

Route::get('post/create', [
	'uses' => 'PostController@create'
]);

Route::post('post/store', [
	'before' => 'csrf',
	'uses' => 'PostController@store'
]);

Route::get('post/delete/{id}', [
	'uses' => 'PostController@destroy'
]);


/* 
-------- PRUEBAS ------------


Route::pattern('hex', '[a-f0-9]+');

Route::get('welcome', function () {
    $url = url('prueba');
    return "This is the url: $url";
});

Route::get('hexroute/{hex?}', function ($hex = null) {
    return "Retieving post: $hex";
});


Route::get('user/{id}/profile', [
    'as' => 'profile',
    function ($id) {
        $url = route('profile', ['id' => $id]);
        return 'This url is: ' . $url;
    }
]); 

Route::group(
    ['prefix' => 'user'],
    function () {
        Route::get('/', function () {
            return '/user';
        });
        Route::get('profile', function () {
            return 'user/profile';
        });
    }
);

Route::get('post/{id?}', function ($id = null) {
    if ($id === null) {
        return "Id not specified";
    }
    return "Retieving post: $id";
});

*/
