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
      $user->name = $req->name;
      // $user_name = array();
      // foreach ($user as $userZZ) {
      //   for ( $i=0; $i < strlen($userZZ); $i++) {
      //     $user_name[$i] = $userZZ->name . "<br>";
      //   }
      // }
      // echo $user_name[10];
      // test order by, since we have no points implemented yet
      // $articles = Article::orderBy('created_at','asc')->get();
      $articles = Article::all();
      // return values from the model to the view
      return view('/home')
      ->withArticles($articles)
      ->withUsers($user);
    }
}
