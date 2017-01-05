<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Session;
use App\Article;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
