<?php

namespace App\Http\Controllers;

use App\Votes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotesController extends Controller
{
    // If user hasn't voted on article before
    function create(Request $req, $id)
    {
        session_start();
        $user = Auth::user()->name;
        $voted_by = Votes::all()->where('voted_by', $user)->where('article_id', $id);

        $vote = new Votes();
        // if it's not in the database..
        if (count($voted_by) == 0) {
            // Create a new vote
            $vote->article_id = $id;
            $vote->value = 0;
            $vote->voted_by = $user;
            $vote->up_down = "default";
            $vote->save();
        } else {
            if ($req->input('up')) {
                $_SESSION["updown"] = $req->input('up');
            }
            if ($req->input('down')) {
                $_SESSION["updown"] = $req->input('down');
            }
            $vote->voted_by = $user;
            return redirect("/registerVote/$id/update");
        }
        return redirect()->back()->withVotes($vote);
    }

    function update(Request $req, $id)
    {
        session_start();
        // Check the name of current logged in user -> later used for checks in database
        $user = Auth::user()->name;
        // Check of er al votes bestaan in de database
        $voted_by = Votes::all()->where('voted_by', "default");
        // 1. Check what article(s) the user voted on
        $voted_art = Votes::all()->where('voted_by', $user);

        if (count($voted_by) == 0) {
            foreach ($voted_by as $vb) {
                if ($vb->article_id == $id) // -> Compare article id ($id) with the one in the database ($a_v_b->article_id)
                {
                    if ($_SESSION["updown"] == "up") {
                        $vb->up_down = "up"; // If upvoted (up_down value == "up")
                        $vb->value = 1; // value   = +1 (bij upvote)
                    }
                    if ($_SESSION["updown"] == "down") // if downvoted
                    {
                        $vb->up_down = "down"; // If downvoted (up_down value == "down")
                        $vb->value = -1; // value = -1  (bij downvote)
                    }
                    $vb->update();
                }
            }
        }
        // 2. Check if the user has already voted on an article (geeft alle artikels terug waar de user op gevote heeft)
        if (count($voted_art) > 0) {
            foreach ($voted_art as $va) {
                if ($va->article_id == $id) // -> Compare article id ($id) with the one in the database ($a_v_b->article_id)
                {
                    if ($_SESSION["updown"] == "up") {
                        $va->up_down = "up"; // If upvoted (up_down value == "up")
                        $va->value = 1; // value   = +1 (bij upvote)
                    }
                    if ($_SESSION["updown"] == "down") // if downvoted
                    {
                        $va->up_down = "down"; // If downvoted (up_down value == "down")
                        $va->value = -1; // value = -1  (bij downvote)
                    }
                    $va->update();
                }
            }
        }
        return redirect()->back()->withVotes($voted_art);
    }
}
