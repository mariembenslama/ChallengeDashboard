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
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);
        return view('pages.Organizer.myChallenges')->with('organizerChallenges', $organizerChallenges);
    }

    public function show($idChallenge) {
       
        return view('pages.Challenge.challengeDetails')->with('idChallenge', $idChallenge);
    }

    public function store(Request $request) {
        return view('pages.Organizer.createChallenge');
    }

    public function update(Request $request, $idChallenge) {

        $this->validate($request ,[
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required'
        ]);

        $challenge = Challenge::find($idChallenge);

        $challenge->titleChallenge = $request->input('title');
        $challenge->descriptionChallenge = $request->input('description');
        $challenge->deadlineChallenge = $request->input('deadline');

        $challenge->save();
        return redirect('organizerchallenges/')->with('success', 'Challenge updated');
    }

    public function edit($idChallenge) {
        $challenge = Challenge::find($idChallenge);
        return view('pages.Organizer.editChallenge')->with('challenge', $challenge);
    }
}
