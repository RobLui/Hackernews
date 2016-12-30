<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the Article dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('home');
    }
}
