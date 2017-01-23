<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Article;
use App\Comment;
use App\Votes;

class VotesController extends Controller
{
    // 'article_id' -> id waar vote op komt
    // 'up_down'    -> omhoog/omlaag
    // 'voted_by'   -> naam
    // "value"      -> -1 of +1

  // If user hasn't voted on article before
  function create(Request $req ,$id)
  {
    session_start();
    //article id in database?
    $article_votes = Votes::all()->where('article_id',$id);
    $votesAll = Votes::all();
    // if it's not in the database..
    if (count($article_votes) == 0)
    {
      $user = Auth::user()->name;
      // Create a new vote
      $vote = new Votes;
      // 1. Check what article the user voted on                         -> Add article id into article_id
      $vote->article_id = $id;
      // 2. Add the user's name into database                            -> Add $user into voted_by
      $vote->voted_by = $user;
      // 3. Check if the user up or downvoted an article                 -> Check wich arrow was clicked, up or down
      // Check for the post containing up or down
        // If upvoted, value = +1                                      -> Add "up" into the up_down table
      if ($req->input('up'))
      {
        $vote->up_down = "up";
        $vote->value = 1;
      }
      // If downvoted, value = -1                                    -> Add "down" into the up_down table
      if ($req->input('down'))
      {
        $vote->up_down = "down";
        $vote->value = -1;
      }
      $vote->save();
    }
    else
    {
      if ($req->input('up'))
      {
        $use_me = "up";
        $_SESSION["updown"] = $req->input('up');
      }
      if ($req->input('down'))
      {
        $use_me = "down";
        $_SESSION["updown"] = $req->input('down');
      }
      return redirect("/registerVote/$id/update");
    }
    return redirect()->back();
  }

  function update(Request $req ,$id)
  {
    session_start();
    // Check the name of current logged in user -> later used for checks in database
    $user = Auth::user()->name;
    // Check if there are votes in the database on an article
    $article_votes = Votes::all()->where('article_id', $id);
    // Check of er al votes bestaan in de database

    // If user has voted on article before
    // 1. Check what article(s) the user voted on
    $voted_art = Votes::all()->where('voted_by', $user);

    // 2. Check if the user has already voted on an article (geeft alle artikels terug waar de user op gevote heeft)
    if (count($article_votes) > 0)
    {
      // Overloop elk artikel
      foreach ($voted_art as $va)
      {
        // if ($va->article_id == $id) // -> Compare article id ($id) with the one in the database ($a_v_b->article_id)
        // {
          // if ($va->posted_by == $user)
          // {
          if ($_SESSION["updown"] == "up")
          {
            $va->up_down = "up"; // If upvoted (up_down value == "up")
            $va->value = 1; // value   = +1 (bij upvote)
          }
          if ($_SESSION["updown"] == "down") // if downvoted
          {
            $va->up_down = "down"; // If downvoted (up_down value == "down")
            $va->value = -1; // value = -1  (bij downvote)
          }
            $va->update();
        // }
      }
    }
  }
  // }
    // return redirect()->back();
  // Er bestaan geen votes in de database -> Voorzorg? :)
  // return redirect("/");
}
