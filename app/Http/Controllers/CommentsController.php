<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Article;
use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    public function index(Request $req,$id)
    {
      $user = User::all();
      $article = Article::all();
      $comment = Comment::all();

      $article->id = $id;
      $article->url = $req->url;
      $article->title = $req->title;
      $article->posted_by = $req->name;
      $article->votes = 1;

      $comment->name = $req->name;
      $comment->post_id = $req->id; // deze werkt
      if(isset($comment[$id])){
        $comment->comment = $comment[$id]->comment;
      }
      return view("comments/show")
        ->withArticles($article)
        ->withComments($comment);
    }

    public function create(Request $req,$id)
    {
      $comment = new Comment;
      $article = Article::all();
      $user = User::all();
      if (Auth::check()) {
        // $request title & url gaat de 2 uit de form opvragen
        $validator = Validator::make($req->all(),['comment' => 'required|max:255']);
        if ($validator->fails()) {
          return redirect()->back()
          -> withErrors($validator);
        }
        if(count($req->comment) > 0 && $req->comment != NULL)
        {
          $comment->comment = $req->comment;
          $comment->name = Auth::user()->name;
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
      }
      else{
        return redirect("login")->with(compact('id'));
      }
    }

    // Show edit comment
    public function edit($id)
    {
        //
    }

    //  Show destroy comment
    public function delete($id)
    {
        //
    }

}
