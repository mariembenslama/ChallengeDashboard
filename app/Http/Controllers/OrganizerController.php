<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organizer;
use App\Challenge;
use DB;

class OrganizerController extends Controller
{

    public function index() {

        $organizerChallenges = Challenge::where('idOrganizer', 1)     
                            ->orderBy('createdAt', 'desc')
                            ->paginate(10);
        return view('pages.Organizer.myChallenges')->with('organizerChallenges', $organizerChallenges);
    }

    public function show($idChallenge) {
       
        return view('pages.Challenge.challengeDetails')->with('idChallenge', $idChallenge);
    }

    public function store(Request $request) {
        return view('pages.Organizer.createChallenge');
    }

    public function edit($idChallenge) {
        return view('pages.Organizer.editChallenge')->with('idChallenge', $idChallenge);
    }
}
