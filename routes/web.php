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

Route::get('/', function () {
    return view('index');
});

Route::get('/instructies', function () {
    return view('instructies');
});

Route::get('/article', function () {
    return view('article');
});

// Add something to the database
Route::post('/add', function (Request $request) {
  // return "works"; -> test om te zien of de post van /add werkt
  $validator = Validator::make($request->all(),[
    "title" => 'required|max:255',
    "url" => 'required|max:255'
  ]);
  // fout bij validatie..
  if ($validator->fails()) {
    return redirect('/article')
    -> withInput()
    -> withErrors($validator);
  }
  // dd($request->url); -> geeft "http://www.google.com" terug (wat ik invoerde)
  // dd($request->title); -> geeft "test" (wat ik invoerde)


});

// Delete something from the database {article} = id van article dat gedelete moet worden
Route::delete('/article\{article}', function () {
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// Route::post('/add', 'ArticleController@index');
