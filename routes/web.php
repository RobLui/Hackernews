<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Simple instruction view, no need for controller
Route::get('/instructies', function () {
    return view('instructies');
})->name('instructions');

// Simple article view, no need for controller
Route::get('/article/add', function () {
    return view('articles/add');
})->name('add_article');

Auth::routes();

// INDEX
Route::get('/', 'ArticleController@index')
    ->name('index');
Route::get('/home', 'ArticleController@index')
    ->name('home');

// ARTICLES
Route::get('article/edit/{id}', 'ArticleController@edit')
    ->name('edit_article');
Route::post('/article/add', 'ArticleController@create')
    ->name('create_article');
Route::post('article/edit/{id}', 'ArticleController@update')
    ->name('edit_article');
Route::post('/article/delete/{id}', 'ArticleControlsler@delete')
    ->name('delete_article_post');
Route::get('/article/delete/{id}', 'ArticleController@delete')
    ->name('delete_article_get');

// COMMENTS
Route::get('/comments/{id}', 'CommentsController@index')
    ->name('get_comments');
Route::post('/comments/add/{id}', 'CommentsController@create')
    ->name('create_comment');
Route::get('/comments/edit/{id}', 'CommentsController@edit')
    ->name('edit_comment_get');
Route::post('/comments/edit/{id}', 'CommentsController@update')
    ->name('update_comment_post');
Route::get('/comments/delete/{id}', 'CommentsController@delete')
    ->name('delete_comment_get');

// VOTES
Route::post('/registerVote/{id}', 'VotesController@create')
    ->name('create_vote_post');
Route::get('/registerVote/{id}', 'VotesController@create')
    ->name('create_vote_get');
Route::get('/registerVote/{id}/update', 'VotesController@update')
    ->name('update_vote_get');