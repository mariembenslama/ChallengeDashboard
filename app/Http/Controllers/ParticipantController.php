<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Participant;
use App\Challenge;
use Route;
use DB;
class ParticipantController extends Controller
{
    public function index() {
        $id = Route::current()->parameter('id');
        return view('pages.Participant.submitCode')->with('id', $id);
    }

    public function store(Request $request, $id){
        $user_id = Auth::user()->id;
        $participant = new Participant();
        $this->validate($request ,[
            'code' => 'required',
        ]);
        
        $participant->code = $request->code;
        $participant->submitted = TRUE;
        $participant->user_id = Auth::user()->id;
        $participant->challenge_id = $id;
        $participant->save();

        return redirect('/challenges')->with('success', 'Code submitted successfully!');
    }

    public function show($id) {
        $codes = Participant::where([['challenge_id','=', $id], ['submitted','=', true]])
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);
        $challenge = Challenge::find($id);
        return view('pages.Participant.checkCodes', compact('codes', 'challenge'));
    }

    public function update(Request $request, $id) {
        $this->validate($request ,[
            'winner' => 'required',
        ]);
        $participant = Participant::where('user_id', $id)->first();
        $participant->winner = true;
        $participant->save();
        return redirect('/challenges')->with('success', 'You decided the winner for the challenge');

    }

}
