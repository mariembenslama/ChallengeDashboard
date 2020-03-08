<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NonGuestController extends Controller
{
    /***** Challenges *****/

    public function ListOfChallenges() {
        $data = array(
            'challenges' => ['Challenge1', 'Challenge2', 'Challenge3']
        );
        return view('pages.challenges') -> with($data);
    }

    public function SearchChallenge() {
        return "Filter of challenges";
    }
    public function getChallengeById() {
        return "List of challenges";
    }

    /***** Comments *****/

    public function SaveComment() {
            return "Save comment";
    }
    public function ModifyComment() {
        return "Modify Comment";
    }
    public function DeleteComment() {
        return "Delete Comment";
    }
}
