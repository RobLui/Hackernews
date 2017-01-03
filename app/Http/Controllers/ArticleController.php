<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Article;


class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the Article dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    //  Show articles
    public function index()
    {
      $articles = Article::orderBy('created_at','asc')->get();
      return view('home')->withArticles($articles);
    }

    // Add articles to database
    public function addArticle(Request $request){
        // return "works"; -> test om te zien of de post van /add werkt
        $validator = Validator::make($request->all(),[
          'title' => 'required|max:255',
          'url' => 'required|max:255'
        ]);
        // fout bij validatie..
        if ($validator->fails()) {
          return redirect('/article')
          -> withInput($flashed_vals)
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
    }



}
