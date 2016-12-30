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

// deze moet nog veranderen naar de pagina waar de artikels moeten verschijnen
Route::post('/add', function (Request $request) {
    $validator = Validator::make(Request::all(), [
      // title & url moeten ingevuld zijn anders wordt je niet naar home gestuurd
        'title' => 'required|max:255',
        'url' => 'required|max:255'
    ]);

    if ($validator->fails()) {
        return redirect('/article')
            ->withInput()
            ->withErrors($validator);
    }
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
