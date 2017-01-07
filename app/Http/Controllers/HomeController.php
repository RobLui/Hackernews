<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;
use App\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth'); // deze zorgt ervoor dat er pas naar de inhoud kan gekeken worden als er ingelogd is
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // test order by, since we have no points implemented yet
      $articles = Article::orderBy('created_at','asc')->get();
      // return values from the model to the view
      return view('/home')->withArticles($articles);
    }
}
