<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Comment;
use App\Article;
use App\User;
use Auth;
use Illuminate\Support\Facades\URL;
use Session;

class CommentsController extends Controller
{
    // SHOW comment index
    public function index(Request $req,$id)
    {
      $user = User::all();
      $article = Article::all();
      $comment = Comment::all();

      $article->id = $id;
      $article->url = $req->url;
      $article->title = $req->title;
      $article->posted_by = $req->name;
      $article->votes = 0;

      $comment->name = $req->name;
      $comment->post_id = $req->id; // deze werkt
      if(isset($comment[$id])){
        $comment->comment = $comment[$id]->comment;
      }
      return view("comments/show")
        ->withArticles($article)
        ->withComments($comment);
    }
    // CREAET comment
    public function create(Request $req,$id)
    {
      $comment = new Comment;
      $article = Article::all()->where('id', $id)->first();
      // Check if there is an article with id to post a comment on..
      $user = User::all();
      if($article)
      {
        // Check if the user is logged in -> only than, an article can be added
        if (Auth::check())
        {
          // $request title & url gaat de 2 uit de form opvragen
          $validator = Validator::make($req->all(),['comment' => 'required|max:255']);
          if ($validator->fails()) {
            return redirect()->back()
            -> withErrors($validator);
          }
          if (!$validator->fails())
          {
            if(count($req->comment) > 0 && $req->comment != NULL)
            {
              $comment->comment = $req->comment;
              $comment->name = Auth::user()->name;
              $comment->post_id = $id;
              $comment->save();
              Session::flash("success", "Comment was succesfully created");
              return redirect()->back();
            }
          }
          else
          {
          $error = array();
          $error = ["Whoops! Something went wrong!","The body field is required"];
          return redirect()->back()->withErrors($error);
        }
        }
      else
      {
        return redirect("login")->with(compact('id'));
      }
    }
    }
    // Show edit comment
    public function edit($id)
    {
      $comment = Comment::findOrFail($id);
      return view("comments/edit",compact("comment"));
    }
    // ELOQUENT UPDATE
    public function update(Request $req,$id)
    {
      $comment = Comment::findOrFail($id);
      // Check if the user of the comment has the intention to edit the comment, if someone else wants to edit..redirect
      if (Auth::user()->name == $comment->name)
      {
        // $request title & url gaat de 2 uit de form opvragen
        $validator = Validator::make($req->all(),['comment' => 'required|max:255']);
        if ($validator->fails())
        {
          return redirect()->back()
          -> withErrors($validator);
        }
        $comment->comment = $req->comment;
        $comment->update($req->all());
        Session::flash("success", "Comment was succesfully updated");
      }
      else
      {
        Session::flash("error_", ("You can't edit a comment that isn't yours!"));
      }
      return redirect("/comments/{$comment->post_id}");
    }
    // ELOQUENT DELETE
    public function delete(Request $req, $id)
    {
      $comment = Comment::findOrFail($id);
      if ($comment->$id == $req->$id)
      {
            $comment->delete($id);
            Session::flash("success", "Comment was succesfully deleted");
      }
      return redirect("comments/$comment->post_id");
    }
}
