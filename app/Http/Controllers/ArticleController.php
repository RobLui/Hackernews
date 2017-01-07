<?php
namespace App\Http\Controllers;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Article;
use resources\views\articles;
use Route;
use View;
use PDO;
class ArticleController extends Controller
{
    public function __construct()
    {

    }

    //  Show articles
    public function index()
    {
      $articles = Article::orderBy('created_at','asc')->get();
      return view('/home')->withArticles($articles);
    }

    // Add articles to database
    public function Add(Request $request){
        // Check if the user is logged in -> only than, an article can be added
        if (Auth::check()) {
          // return "works"; -> test om te zien of de post van /add werkt
          $validator = Validator::make($request->all(),[
          'title' => 'required|max:255',
          'url' => 'required|max:255'
        ]);
        // fout bij validatie..
        if ($validator->fails()) {
          return view('/articles/add')
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

    public function Delete(Request $req,$id)
    {
      $article = new Article;
       // TEST EDIT FUNCTION - has to become fully functionable still
       // $request title & url gaat de 2 uit de form opvragen
       $article->title = $req->title;
       $article->url = $req->url;
      // $article_id = $req->$id;
      // $article_found_id = Article::find($article_id);
      // // $article->id = $req->id;
      // // $request title & url gaat de 2 uit de form opvragen
      // // $article->id = $request->id;
      // // $article->title = $req->title;
      // // $article->url = $req->url;
      // $articles = Article::orderBy('created_at','asc')->get();
      // return redirect('home')
      // ->withArticles($articles);
      try {
      // Maak een connectie met de lokale MySQL server en selecteer de database bieren
      $db = new PDO('mysql:host=localhost;dbname=opdracht', 'root','');
      //Als er op de delete knop wordt gedrukt..
         //query to do in db
         $db_delete_query	=	'DELETE FROM articles WHERE id = :id';
         $db_del_access = $db->prepare($db_delete_query);
         $db_del_access->bindValue('id',$id);
         $db_del_access->execute();
         //link met db
       }
       catch (Exception $e) {
        $e->getMessage();
      }
      return redirect("home");
    }

    public function delete_test()
    {
      $articles = Article::orderBy('created_at','asc')->get();
      // $article->save();

      View::share('article/delete/',$articles);
      view('/home')->withArticles( "hello world");
    }
      // Edit article with particular id
    public function Edit(Request $request)
    {
      $article = new Article;
      // TEST EDIT FUNCTION - has to become fully functionable still
      // $request title & url gaat de 2 uit de form opvragen
      $article->title = $request->title;
      $article->url = $request->url;
      return view("articles/edit")->withInput($article);
      // ->withArticles($article);
    }
  }
