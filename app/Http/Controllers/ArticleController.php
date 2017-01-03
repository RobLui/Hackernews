<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Resources\views\CRUD;
use Auth;
use App\Article;
use resources\views\articles;


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
    public function AddArticle(Request $request){

        // Check if the user is logged in -> only than, an article can be added
        if (Auth::check()) {
          // return "works"; -> test om te zien of de post van /add werkt
          $validator = Validator::make($request->all(),[
          'title' => 'required|max:255',
          'url' => 'required|max:255'
        ]);

        // fout bij validatie..
        if ($validator->fails()) {
          return redirect('/article')
          -> withErrors($validator);
        }

        // Geen fout bij validatie..
        $article = new Article;
        // $request title & url gaat de 2 uit de form opvragen
        $article->title = $request->title;
        $article->url = $request->url;
        $article->save();
        }
        return redirect("/home");
    }

    // Show article with particular id
    public function Show($id)
    {

    }

    // Edit article with particular id
    public function Edit(Request $request, $îd)
    {
      $validator = Validator::make($request->all(),[
        'title' => 'required|max:255',
        'url' => 'required|max:255'
      ]);
      $article = Article::find($id);
      $article->title = $request->title;
      $article->url = $request->url;
      $article->save();
      // return redirect("/home")->with("Article edited");
      return view('/article');
    }

    // Soft delete
    public function Delete($id)
    {

    }

}
