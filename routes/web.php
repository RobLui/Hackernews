<?php

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
/*
welcome = main page
*/

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

Route::get('/', function () {
    return view('index');
});

Route::get('/instructies', function () {
    return view('instructies');
});

Route::get('/article', function () {
    return view('article');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('/add', 'ArticleController@index');
