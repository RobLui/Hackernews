<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Article;
use App\Votes;
use App\User;

class VotesController extends Controller
{
    // 'article_id' -> id waar vote op komt
    // 'up_down'    -> omhoog/omlaag
    // 'voted_by'   -> naam
    // "value"      -> -1 of +1

  function RegisterVote(Request $req ,$id)
  {
    // Get all votes in the database
    $votes = Votes::all();
    // Check the name of current logged in user -> later used for checks in database
    $user = Auth::user()->name;
    // Check all votes on an article -> this should later be added to articles value
    $article_votes = Votes::all()->where('id', $id);
    // Er bestaan votes in de database
    if ($votes->voted_by != NULL && $votes->voted_by != " ")
    {
      // If user has voted on article before
        // 1. Check what article the user voted on                         -> Add article id into article_id
        // 2. Add the user's name into database                            -> Add $user into voted_by
        // 3. Check if the user up or downvoted an article                 -> Check for value in database @ up_down
          // If upvoted before (up_down value == "up")
            // value = -1  (bij downvote)                                  -> Change "up" to "down" into the up_down row
            // value = +1  (bij upvote)
          // If downvoted before (up_down value == "down")
            // value = +1 (bij upvote)                                     -> Change "down" to "up" into the up_down row
            // value = -1  (bij downvote)

      // If user hasn't voted on article before
        // 1. Check what article the user voted on                         -> Add article id into article_id
          $votes->article_id = $id;
        // 2. Add the user's name into database                            -> Add $user into voted_by
          $votes->voted_by = $user;
        // 3. Check if the user up or downvoted an article                 -> Check wich arrow was clicked, up or down
          // Check for the post containing up or down
            // If upvoted, value = +1                                      -> Add "up" into the up_down table
            if ($req->up)
            {
              $votes->up_down = "up";
              $votes->value = 1;
            }
            // If downvoted, value = -1                                    -> Add "down" into the up_down table
            if ($req->down)
            {
              $votes->up_down = "down";
              $votes->value = -1;
            }
    }
    // Er bestaan geen votes in de database -> Voorzorg? :)
    else
    {
      return redirect()->back()->with(compact('id'));
    }
  }


}
