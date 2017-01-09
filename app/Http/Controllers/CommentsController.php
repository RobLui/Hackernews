<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Article;

class CommentsController extends Controller
{

    public function index(Request $request,$id)
    {
      $comment = Comment::all();
      $article = Article::orderBy('created_at','asc')->get();
      $article->id = $id;
      $comment->post_id = $id;
      return view('comments/show')
        ->withComments($comment)
        ->withArticles($article);
    }

    public function Add(Request $request,$id)
    {
      // IK MOET EEN POST_ID ophalen later :) - REMINDER -
      $comment = new Comment;
      $article = new Article;
      // $request title & url gaat de 2 uit de form opvragen
      $comment->name = "test";
      $comment->comment = $request->comment;
      $comment->post_id = $id;
      $comment->save();
      return view('comments/show')
        ->withComments($comment)
        ->withArticles($article);
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
