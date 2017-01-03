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
      $articles = Article::orderBy('created_at','asc')->get();
      // dd($article)->withArticles($articles);
      return view('index')->withArticles($articles);
    }
}
