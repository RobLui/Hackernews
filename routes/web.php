<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;

// Simple instruction view, no need for controller right now
Route::get('/instructies', function () {
    return view('instructies');
});

// Simple article view, no need for controller right now
Route::get('/article/add', function () {
    return view('articles/add');
});

Auth::routes();

// HOME & INDEX
  // Article controller showing articles @ index
  Route::get('/', 'ArticleController@index');
  // Home controller showing articles @ home
  Route::get('/home', 'HomeController@index');

// ARTICLES
  // Add id param to route, makes working with the id possible! :)
  Route::get('article/edit/{id}', 'ArticleController@Edit');
  // Controller to add articles
  Route::post('/article/add', 'ArticleController@Add');
  // Test
  Route::get('article/delete/{id}', 'ArticleController@Delete');
  // Contoller to delete articles
  Route::post('article/delete/{id}', 'ArticleController@Delete');


// COMMENTS
  // Controller to add comments
  Route::get('/comments/{id}', 'CommentsController@index');

//
//   Route::delete('article/delete/{id}', [
//     'uses'      => 'TodoController@destroy',
//     'as'        => 'todo.destroy',
//     'protected' => true
// ]);
