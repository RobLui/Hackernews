<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;
use App\Article;

// Route::any('/edit', array('uses' => 'ArticleController@Edit'));

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

// Controller to add articles
Route::post('/add', 'ArticleController@AddArticle');

// Controller to edit articles
Route::get('article/edit', function () {
    // Session::flash('values', $passvalues);
    // $oldinput = Session::get('values');
    return view('articles/edit');
    // ->with($oldinput);
});
