<?php
namespace App\Http\Controllers;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Notification;
use resources\views\articles;
use App\Article;
use App\User;
use App\Comment;
use Auth;

class ArticleController extends Controller
{
    public   function __construct()
    {

    }

    public function index(request $req)
    {
      $user = User::all();
      $article = Article::all();
      $comment = Comment::all();

      $article->votes = 1;
      $user->name = $req->name;
      return view('index')
      ->withArticles($article)
      ->withComments($comment);
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
          $user = User::all();
          // $request title & url = get data from both out of the submitted form
          $articles->title = $request->title;
          $articles->url = $request->url;
          $articles->votes = "1";
          $articles->posted_by = Auth::user()->name;
          // Save into db
          $articles->save();
          return redirect("/");
          }
          else
          {
            return redirect("login");
          }
    }
    // ELOQUENT EDIT
    public function edit($id)
    {
      $user = User::all();
      if(Auth::check()) {
        $articles = Article::findOrFail($id);
        return view('articles/edit',compact('articles'));
      }
      else {
        return redirect("/home")->withMessage('msg','You are not the user off this article ');
      }
    }
    // ELOQUENT UPDATE
    public function update(Request $req, $id)
    {
      $articles = Article::findOrFail($id);
      // Check if the user is logged in -> only than, an article can be added
      if (Auth::user()->name == $articles->posted_by)
      {
        // Validation handler
        $validator = Validator::make($req->all(),[
        'title' => 'required|max:255',
        'url' => 'required|max:255'
        ]);
      // Validation error, show errors
        if ($validator->fails())
        {
          return view('/articles/edit')
          -> withArticles($articles)
          -> withErrors($validator);
        }
        // Check for valid email through regEX
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$req->url)) {
          return view('/articles/edit')
          -> withArticles($articles)
          -> withErrors($req->url . " is not a valid URL");
        } //if no errors occur, the article can update
        $articles->update($req->all());
      }
      return redirect("/")->with(compact('id'));
    }
    // ELOQUENT DELETE
    public function delete(Request $req, $id)
    {
      $articles = Article::findOrFail($id);
      //cancel if no delete is wanted
      if (!$req->cancel)
      {
        if (Auth::user()->name == $articles->posted_by) {
            $articles->delete($req->all());
        }
      }
      return redirect("/")->with(compact('id'));
    }

    // -------------------------------------------------------------------------
    // VOORBEREIDING VOTING
    // -------------------------------------------------------------------------
    // Voting...THINGS TO CHECK FOR WHEN SEARCHING A WAY TO VOTE -- Robbert ----

    // *Check if user has voted on article*
    //------ Kijk in tabel in database, voeg toe als de user vote

    // *If user voted, check for wich vote, up or downvote?*
    //------ Voeg up of downvote in database toe

    // *Check the amount of votes the article currently has*
    //------ Maak een tabel bij article bij dat de upvotes & downvotes bijhoudt

    // *Subtract -1 if downvote has been clicked and if not upvoted yet*
    // *Add +2 if downvoted already, and upvote has been clicked*
    //------ Ga toevoegen of aftrekken van tabel

    // *Add +1 if upvote has been clicked and if not downvoted yet*
    // *Subtract -2 if upvoted already, and downvote has been clicked*
    //------ Ga toevoegen of aftrekken van tabel
    // -------------------------------------------------------------------------
    // -------------------------------------------------------------------------


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
        // return redirect("/home");
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
