<?php
namespace App\Http\Controllers;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use resources\views\articles;
use App\Article;
use Auth;
// use PDO;

class ArticleController extends Controller
{
    public   function __construct()
    {

    }

    //  SHHOW ARTICLES @ INDEX
    public function index()
    {
      $article = Article::orderBy('created_at','asc')->get();
      return view('index')->withArticles($article);
    }
    // CREATE
    public function create(Request $request)
    {
          // Check if the user is logged in -> only than, an article can be added
          if (Auth::check()) {
            // Validation handler
            $validator = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'url' => 'required|max:255'
          ]);
          // Validation error, show errors, check for valid email through regEX
          if ($validator->fails()) {
            return view('/articles/add')
            -> withErrors($validator);
          }
          if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$request->url)) {
            return view('/articles/add')
            -> withErrors($request->url . " is not a valid URL");
          }
          // No validation error, continue..
          $articles = new Article;
          // $request title & url = get data from both out of the submitted form
          $articles->title = $request->title;
          $articles->url = $request->url;
          $articles->posted_by = "test";
          // Save into db
          $articles->save();
          }
          return redirect("/home");
    }
    // ELOQUENT EDIT
    public function edit($id)
    {
      $articles = Article::findOrFail($id);
      return view('articles/edit',compact('articles'));
    }
    // ELOQUENT UPDATE
    public function update(Request $req, $id)
    {
      $articles = Article::findOrFail($id);
      // Check if the user is logged in -> only than, an article can be updated
      if (Auth::check()) {
        {
              // Check if the user is logged in -> only than, an article can be added
              if (Auth::check()) {
                // Validation handler
                $validator = Validator::make($req->all(),[
                'title' => 'required|max:255',
                'url' => 'required|max:255'
              ]);
              // Validation error, show errors
              if ($validator->fails()) {
                return view('/articles/add')
                -> withErrors($validator);
              }
              // Check for valid email through regEX
              if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$req->url)) {
                return view('/articles/add')
                -> withErrors($req->url . " is not a valid URL");
              }
        $articles->update($req->all());
      }
      return redirect("/home");
    }
  }
}
    // ELOQUENT DELETE
    public function delete(Request $req, $id)
    {
      $articles = Article::findOrFail($id);
      // Check if the user is logged in -> only than, an article can be deleted
      if (Auth::check()) {
          $articles->delete($req->all());
        }
      return redirect("/home");
    }

  // EDIT VIEW
    // public function index_edit(Request $request,$id){
    //   $articles = Article::all();
    //   $articles = Article::where("id", '=', $id)->get()->first();
    //   return view("articles/edit")->withArticles($articles);
    // }

  // ADD article
    // public function Add(Request $request){
    //     // Check if the user is logged in -> only than, an article can be added
    //     if (Auth::check()) {
    //       // Validation handler
    //       $validator = Validator::make($request->all(),[
    //       'title' => 'required|max:255',
    //       'url' => 'required|max:255'
    //     ]);
    //     // Validation error, show errors
    //     if ($validator->fails()) {
    //       return view('/articles/add')
    //       -> withErrors($validator);
    //     }
    //     // No validation error, continue..
    //     $article = new Article;
    //     // $request title & url = get data from both out of the submitted form
    //     $article->title = $request->title;
    //     $article->url = $request->url;
    //     // Save into db
    //     $article->save();
    //     }
    //     return redirect("/home");
    // }

  // EDIT article
    // public function edit(Request $request,$id)
    // {
        // $articles = Article::all();
        // $articles = Article::where("id", '=', $id)->get()->first();
        // try {
        //  // Establish connection & connect to db opdracht
        //  $db = new PDO('mysql:host=localhost;dbname=opdracht', 'root','');
        //  //Update query
        //  $db_update_query	=	'UPDATE articles SET title=:title, url=:url WHERE id = :id';
        //  $db_del_access = $db->prepare($db_update_query);
        //  $db_del_access->bindValue('id',$id);
        //  $db_del_access->bindValue('url',$request->url);
        //  $db_del_access->bindValue('title',$request->title);
        //  $db_del_access->execute();
        //  //link met db
        //  }
        //  catch (Exception $e) {
        //   $e->getMessage();
        // }
        // return redirect('/home')->withArticles($articles);
    // }

  // DELETE article
    // public function Delete(Request $req,$id)
    // {
    //   // $article = new Article;
    //   $article = Article::orderBy('created_at','asc')->get();
    //   // $article_found_id = Article::find($id);
    //   $article->title = $req->title;
    //   $article->url = $req->url;
    //   // $article_id = $req->$id;
    //   // // $article->id = $req->id;
    //   try {
    //    // Establish connection & connect to db opdracht
    //    $db = new PDO('mysql:host=localhost;dbname=opdracht', 'root','');
    //    //Delete query
    //    $db_delete_query	=	'DELETE FROM articles WHERE id = :id';
    //    $db_del_access = $db->prepare($db_delete_query);
    //    $db_del_access->bindValue('id',$id);
    //    $db_del_access->execute();
    //    //link met db
    //    }
    //    catch (Exception $e) {
    //     $e->getMessage();
    //   }
    //   return redirect('/home')->withArticles($article);
    // }
}
