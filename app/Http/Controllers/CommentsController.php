<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Article;
use App\User;

class CommentsController extends Controller
{

    public function index(Request $request,$id)
    {
      $article = Article::all();
      $article->id = $id;
      $article->url = $request->url;
      $article->title = $request->title;
      $article->posted_by = $request->posted_by;

      $comment = Comment::all();
      $comment->name = $request->name;
      $comment->post_id = $article->id;
      $comment->comment = $comment->post_id ;

      return view('comments/show')
        ->withComments($comment)
        ->withArticles($article);
    }

    public function Add(Request $request,$id)
    {
      // IK MOET EEN POST_ID ophalen later :) - REMINDER -
      $comment = new Comment;
      $article = Article::all();
      $user = User::all();
      // $request title & url gaat de 2 uit de form opvragen
      $comment->comment = $request->comment;
      $comment->name = $user[0]->name;
      $comment->post_id = $id;
      $comment->save();
      // redirect to previous page (the page where to post was done :) -> working
      return redirect()->back();
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
