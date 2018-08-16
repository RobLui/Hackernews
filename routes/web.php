<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Simple instruction view, no need for controller
    Route::get('/instructies', function () {
        return view('instructies');
    });

// Simple article view, no need for controller
    Route::get('/article/add', function () {
        return view('articles/add');
    });

Auth::routes();

// HOME & INDEX
  // Article controller showing articles @ index
  Route::get('/', 'ArticleController@index');
  // Home controller showing articles @ home
  Route::get('/home', 'ArticleController@index');

// ARTICLES -------- ELOQUENT METHODS ----- PASCAL's REQUEST :-)
  // SHOW EDIT view
  Route::get('article/edit/{id}', 'ArticleController@edit');
  // ADD article
  Route::post('/article/add', 'ArticleController@create');
  // UPDATE article
  Route::post('article/edit/{id}', 'ArticleController@update');
  // DELETE articles
  Route::post('/article/delete/{id}', 'ArticleControlsler@delete');
  Route::get('/article/delete/{id}', 'ArticleController@delete');


// COMMENTS
  // SHOW COMMENT view
  Route::get('/comments/{id}', 'CommentsController@index');
  // ADD comments
  Route::post('/comments/add/{id}', 'CommentsController@create');
  // EDIT comments
  Route::get('/comments/edit/{id}','CommentsController@edit');
  Route::post('/comments/edit/{id}','CommentsController@update');
  // DELETE comments
  Route::get('/comments/delete/{id}','CommentsController@delete');

// VOTES
  Route::post('/registerVote/{id}','VotesController@create');
  Route::get('/registerVote/{id}','VotesController@create');

  Route::get('/registerVote/{id}/update','VotesController@update');
  Route::get('/registerVote/{id}/update','VotesController@update');