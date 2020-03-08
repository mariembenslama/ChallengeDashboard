<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizerController extends Controller
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
    public function DeleteChallenge() {
        return "Delete challenge";
    }

    /***** Guests *****/

    public function ListOfGuests() {
            return "List of guests";
    }
    public function SearchGuest() {
        return "Search guest";
    }
    public function DeleteGuest() {
        return "Delete guest";
    }
    public function GetGuestById() {
        return "Guest by Id";
    }

}
