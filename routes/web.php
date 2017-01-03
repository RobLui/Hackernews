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

Route::get('/', function () {
    $articles = Article::orderBy('created_at','asc')->get();
    // dd($article)->withArticles($articles);
    return view('index')->withArticles($articles);
});

Route::get('/home', function () {
    $articles = Article::orderBy('created_at','asc')->get();
    return view('home')->withArticles($articles);
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
    'title' => 'required|max:255',
    'url' => 'required|max:255'
  ]);
  // fout bij validatie..
  if ($validator->fails()) {
    return redirect('/article')
    -> withInput()
    -> withErrors($validator);
  }
  // dd($request->url); -> geeft "http://www.google.com" terug (wat ik invoerde)
  // dd($request->title); -> geeft "test" (wat ik invoerde)

  // Geen fout bij validatie..
  $article = new Article;
  // $request title & url gaat de 2 uit de form opvragen
  $article->title = $request->title;
  $article->url = $request->url;
  $article->save();
  return redirect("/home");
});

// Delete something from the database {article} = id van article dat gedelete moet worden
Route::delete('/article\{article}', function () {
});

Auth::routes();

// Route::get('/home', 'HomeController@index');

// Route::post('/add', 'ArticleController@index');
