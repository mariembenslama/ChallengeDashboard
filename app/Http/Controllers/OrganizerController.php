<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organizer;
use App\Challenge;
use DB;
use Auth;
class OrganizerController extends Controller
{

    public function index() {

        $organizerChallenges = Challenge::where('organizer_id', Auth::user()->id)     
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);
        return view('pages.Organizer.myChallenges')->with('organizerChallenges', $organizerChallenges);
    }

    public function show($id) {
        return view('pages.Challenge.challengeDetails')->with('id', $id);
    }

    public function store(Request $request) {

        
    }

    public function update(Request $request, $id) {

        $this->validate($request ,[
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required'
        ]);

        $challenge = Challenge::find($id);

        $challenge->title = $request->input('title');
        $challenge->description = $request->input('description');
        $challenge->deadline = $request->input('deadline');

        $challenge->save();
        return redirect('organizerchallenges/')->with('success', 'Challenge updated');
    }

    public function edit($id) {
        $challenge = Challenge::find($id);
        return view('pages.Organizer.editChallenge')->with('challenge', $challenge);
    }

    public function destroy($id) {
        $challenge = Challenge::find($id);
        $challenge->delete();
        return redirect('organizerchallenges/')->with('success', 'Challenge deleted');
    }
}
