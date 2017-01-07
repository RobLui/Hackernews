<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Session;
use App\Article;

class CommentsController extends Controller
{
    public function index(Request $request,$id)
    {
      $comments = Comment::orderBy('created_at','asc')->get();
      $article = new Article;
      // $request title & url gaat de 2 uit de form opvragen
      $article->title = $request->title;
      $article->url = $request->url;
      return view('comments/show')
        ->withComments($comments)
        ->withArticles($article,["title","url"]);
    }
    // Create a new comment
    public function create()
    {
        //
    }

    // Store comment to database
    public function store(Request $request, $post_id)
    {
        $this->validate($request, array(
            'title'      =>  'required|max:255',
            'comment'   =>  'required|min:5|max:2000'
            ));
        $post = Post::find($post_id);
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        // $comment->post()->associate($post);
        $comment->save();
        Session::flash('success', 'Comment was added');
        return redirect("/home");
    }

    // Show comment
    public function show($id)
    {
        //
    }
    // Show edit comment
    public function edit($id)
    {
        //
    }
    //  Show update comment
    public function update(Request $request, $id)
    {
        //
    }

    //  Show destroy comment
    public function destroy($id)
    {
        //
    }
}
