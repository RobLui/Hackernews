<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\User;
use App\Votes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use function compact;

class ArticleController extends Controller
{
    //GET
    public function index(request $req)
    {
        $user = User::all();
        $user->name = $req->name;

        $articles = Article::all();
        $comments = Comment::all();
        $votes = Votes::all();

        return view('index', compact('articles', 'comments', 'votes'));
    }

    //CREATE
    public function create(Request $request)
    {
        // Check if the user is logged in -> only than, an article can be added
        if (Auth::check()) {
            // Validation handler
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'url' => 'required|max:255'
            ]);
            // Validation error, show errors, check for valid email through regEX
            if ($validator->fails()) {
                return view('/articles/add')
                    ->withErrors($validator);
            }
            // Preg match url
            /** @var Request $request */
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $request->url())) {
                return view('/articles/add')
                    ->withErrors($request->url() . " is not a valid URL");
            }
            // No validation error, continue..
            $articles = new Article();
            $votes = new Votes();

            // $request title & url = get data from both out of the submitted form
            $articles->title = $request->title;
            $articles->url = $request->url;
            $articles->votes = "0";
            $articles->posted_by = Auth::user()->name;
            $articles->save();

            $votes->article_id = $articles->id;
            $votes->voted_by = "default";
            $votes->value = 0;
            $votes->up_down = "";
            $votes->save();

            Session::flash("success", ($request->title . " was succesfully created"));
            return redirect("/");
        } else {
            Session::flash("error_", ("There was an error trying to create an article!"));
            return redirect("login");
        }
    }

    //EDIT
    public function edit($id)
    {
        if (Auth::check()) {
            $articles = Article::findOrFail($id);
            return view('articles/edit', compact('articles'));
        } else {
            return redirect("/home")->withMessage('msg', 'You are not the user off this article ');
        }
    }

    //UPDATE
    public function update(Request $req, $id)
    {
        $articles = Article::findOrFail($id);
        // Check if the user is logged in -> only than, an article can be added
        if (Auth::user()->name == $articles->posted_by) {
            // Validation handler
            $validator = Validator::make($req->all(), [
                'title' => 'required|max:255',
                'url' => 'required|max:255'
            ]);
            // Validation error, show errors
            if ($validator->fails()) {
                return view('/articles/edit')
                    ->withArticles($articles)
                    ->withErrors($validator);
            }
            // Check for valid email through regEX
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $req->url())) {
                return view('/articles/edit')
                    ->withArticles($articles)
                    ->withErrors($req->url() . " is not a valid URL");
            }
            //if no errors occur, the article can update
            $articles->update($req->all());
            Session::flash("success", ($req->title . " was succesfully updated"));
        } else {
            Session::flash("error_", ("You can't edit an article that isn't yours!"));
        }
        return redirect("/")->with(compact('id'));
    }

    //DELETE
    public function delete(Request $req, $id)
    {
        $articles = Article::findOrFail($id);
        if (!$req->cancel) {
            if (Auth::user()->name == $articles->posted_by) {
                $articles->delete($req->all());
                Session::flash("success", ("Succesfully deleted the article"));
            }
        }
        return redirect("/")->with(compact('id'));
    }
}
