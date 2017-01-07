<?php
namespace App\Http\Controllers;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use resources\views\articles;
use App\Article;
use Auth;
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
          // Validation handler
          $validator = Validator::make($request->all(),[
          'title' => 'required|max:255',
          'url' => 'required|max:255'
        ]);
        // Validation error, show errors
        if ($validator->fails()) {
          return view('/articles/add')
          -> withErrors($validator);
        }
        // No validation error, continue..
        $article = new Article;
        // $request title & url = get data from both out of the submitted form
        $article->title = $request->title;
        $article->url = $request->url;
        // Save into db
        $article->save();
        }
        return redirect("/home");
    }


    public function Delete(Request $req,$id)
    {
      // $article = new Article;
      $article = Article::orderBy('created_at','asc')->get();
      // $article_found_id = Article::find($id);
      $_SESSION["id"] = $id;
      $article->title = $req->title;
      $article->url = $req->url;
      // $article_id = $req->$id;
      // // $article->id = $req->id;
      try {
       // Establish connection & connect to db opdracht
       $db = new PDO('mysql:host=localhost;dbname=opdracht', 'root','');
       //Delete query
       $db_delete_query	=	'DELETE FROM articles WHERE id = :id';
       $db_del_access = $db->prepare($db_delete_query);
       $db_del_access->bindValue('id',$id);
       $db_del_access->execute();
       //link met db
       }
       catch (Exception $e) {
        $e->getMessage();
      }
      return redirect('/home')->withArticles($article);
    }

    public function delete_test()
    {
      $article = Article::orderBy('created_at','asc')->get();
      return view('/home')->withArticles($article);
    }
      // Edit article with particular id
    public function Edit(Request $request)
    {
      $article = Article::orderBy('created_at','asc')->get();
      // TEST EDIT FUNCTION - has to become fully functionable still
      // $request title & url gaat de 2 uit de form opvragen
      $article->title = $request->title;
      $article->url = $request->url;
      $article->id = $request->id;
      return view("articles/edit")->withArticles($article);
      // ->withArticles($article);
    }
  }
