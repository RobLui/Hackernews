<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;
use App\Article;
use App\User;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth'); // deze zorgt ervoor dat er pas naar de inhoud kan gekeken worden als er ingelogd is
    }

    public function index(request $req)
    {
      $user = User::all();
      $articles = Article::all();
      $user->name = $req->name;

      return view('/home')
      ->withArticles($articles)
      ->withUsers($user);
    }
}
