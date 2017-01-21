<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Article;
use App\Votes;
use App\User;
use Auth;

class VotesController extends Controller
{
    // 'article_id' -> id waar vote op komt
    // 'up_down'    -> omhoog/omlaag
    // 'voted_by'   -> naam
    // "value"      -> -1 of +1

  function update(Request $req ,$id)
  {
    // Get all votes in the database
    $votes = Votes::all();
    // Check the name of current logged in user -> later used for checks in database
    $user = Auth::user()->name;

    // Check if there are votes in the database on an article
    $article_votes = Votes::all()->where('$article_id', $id);
    // Check of er al votes bestaan in de database
    if ($article_votes != NULL && $article_votes != " ")
    {
      // If user has voted on article before
      // 1. Check what article(s) the user voted on
      $articles_voted_by = Votes::all()->where('voted_by', $user);
      // 2. Check if the user has already voted on an article (geeft alle artikels terug waar de user op gevote heeft)
      if ($articles_voted_by != NULL || count($articles_voted_by) > 0)
      {
        foreach ($articles_voted_by as $a_v_b)
        {
          if ($a_v_b->article_id == $id) // -> Compare article id ($id) with the one in the database ($a_v_b->article_id)
          {
            if ($a_v_b->posted_by == $user)
            {
              if ($req->up) //if upvoted
              {
                $votes->up_down = "up"; // If upvoted (up_down value == "up")
                $votes->value = 1; // value = +1 (bij upvote)
              }
              if ($req->down) // if downvoted
              {
                $votes->up_down = "down"; // If downvoted (up_down value == "down")
                $votes->value = -1; // value = -1  (bij downvote)
              }
              $a_v_b->update();
            }
          }
        }
      }
      // If user hasn't voted on article before
      else
      {
        // Create a new vote
        $vote = new Vote;
        // 1. Check what article the user voted on                         -> Add article id into article_id
        $vote->article_id = $id;
        // 2. Add the user's name into database                            -> Add $user into voted_by
        $vote->voted_by = $user;
        // 3. Check if the user up or downvoted an article                 -> Check wich arrow was clicked, up or down
        // Check for the post containing up or down
          // If upvoted, value = +1                                      -> Add "up" into the up_down table
        if ($req->up)
        {
          $vote->up_down = "up";
          $vote->value = 1;
        }
        // If downvoted, value = -1                                    -> Add "down" into the up_down table
        if ($req->down)
        {
          $vote->up_down = "down";
          $vote->value = -1;
        }
        $vote->save();
      }
    }
    // Er bestaan geen votes in de database -> Voorzorg? :)
    return redirect()->back()->with(compact('id'));
  }


}
