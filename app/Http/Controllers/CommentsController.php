<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Article;
use App\User;

class CommentsController extends Controller
{
    public function index(Request $req,$id)
    {
      $article = Article::all();
      $article->id = $id;
      $article->url = $req->url;
      $article->title = $req->title;
      $article->posted_by = $req->posted_by;

      $comment = Comment::all();
      $comment->id = $id;
      $comment->name = $req->name;
      $comment->post_id = $req->id; // deze werkt
      $comment->comment = $comment[$id]->comment ;

      return view("comments/show")
        ->withArticles($article)
        ->withComments($comment);
    }

    public function Add(Request $req,$id)
    {
      $comment = new Comment;
      $article = Article::all();
      $user = User::all();
      // $request title & url gaat de 2 uit de form opvragen
      if(count($req->comment) > 0 && $req->comment != NULL)
      {
        $comment->comment = $req->comment;
        $comment->name = $user[0]->name;
        $comment->post_id =$id;
        $comment->save();
        return redirect()->back();
      }
      else
      {
        $error = array();
        $error = ["Whoops! Something went wrong!","The body field is required"];
        return redirect()->back()->withErrors($error);
      }
      // redirect to previous page (the page where to post was done :) -> working
    }

    // Show edit comment
    public function Edit($id)
    {
        //
    }

    //  Show destroy comment
    public function Delete($id)
    {
        //
    }
}
