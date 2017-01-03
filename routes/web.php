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
use Illuminate\Http\Request;
use App\Article;

// Simple instruction view, no need for controller right now
Route::get('/instructies', function () {
    return view('instructies');
});

// Simple article view, no need for controller right now
Route::get('/article', function () {
    return view('article');
});

// Delete from db, still to make a workaround, no hard deletes can be done
Route::delete('/article\{article}', function () {
});

Auth::routes();

// Home controller
Route::get('/', 'HomeController@index');

// Controller for showing articles
Route::get('/home', 'ArticleController@index');

// Controller for adding articles
Route::post('/add', 'ArticleController@addArticle');
