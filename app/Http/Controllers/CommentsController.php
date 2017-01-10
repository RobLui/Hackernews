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
      $article = Article::orderBy('created_at','asc')->get();
      $article->id = $id;
      $article->url = $request->url;
      $article->title = $request->title;
      $article->posted_by = $request->posted_by;
      $comment = Comment::all();
      $comment->name = $request->name;
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
      $user = User::all();
      // $request title & url gaat de 2 uit de form opvragen
      $comment->comment = $request->comment;
      $comment->name = $user[0]->name;
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
