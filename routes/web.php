<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;
use App\Article;

// Simple instruction view, no need for controller right now
Route::get('/instructies', function () {
    return view('instructies');
});

// Simple article view, no need for controller right now
Route::get('/article/add', function () {
    return view('articles/add');
});

Auth::routes();

// Home controller
Route::get('/', 'HomeController@index');

// Controller for showing articles
Route::get('/home', 'ArticleController@index');

// Controller to add articles
Route::post('/article/add', 'ArticleController@AddArticle');

// Controller to add comments
Route::get('/comments/{id}', 'CommentsController@index');

// Add id param to route, makes working with the id possible! :)
Route::get('article/edit/{id}', 'ArticleController@Edit');

// Used for later on deleting?
Route::post('article/edit/{id}', 'ArticleController@Delete');
