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
    // Er bestaan votes in de database
    if ($votes->voted_by != NULL || $votes->voted_by != " ")
    {
      // *Check the amount of votes the article currently has*
      //------ Maak een tabel bij article bij dat de upvotes & downvotes bijhoudt

      // User has voted on article before
        // 1. Check what article the user voted on                         -> Add article id into article_id
        // 2. Add the user's name into database                            -> Add $user into voted_by
        // 3. Check if the user up or downvoted an article                 -> Check for value in database @ up_down
          // If upvoted before (up_down value == "up")
            // value = -1  (bij downvote)                                  -> Change "up" to "down" into the up_down table
            // value = +1  (bij upvote)
          // If downvoted before (up_down value == "down")
            // value = +1 (bij upvote)                                     -> Change "down" to "up" into the up_down table
            // value = -1  (bij downvote)

      // User hasn't voted on article before
        // Create a vote on the preferred article
          // Check for up or downvote                                      -> Check wich arrow was clicked, up or down
          // If upvoted value = -1                                         -> Add "up" into the up_down table
          // If downvoted value = +1                                       -> Add "down" into the up_down table
    }
    // Er bestaan geen votes in de database -> Voorzorg? :)
    else
    {
      return redirect("/")->with(compact('id'));
    }
  }


}
