<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;
use App\Participant;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Challenge;
class GuestController extends Controller
{
    
    public function index() {

        $idG = Auth::user()->id;
        $participant = new Participant();
        $sql = "select c.title, c.description, c.deadline, c.status, c.created_at,
                c.updated_at, c.deleted_at, p.code, c.organizer_id, p.submitted_at, 
                p.challenge_id from participants p, challenges c where p.guest_id = $idG and p.challenge_id = c.id";

        $guestChallenges = DB::select($sql);
        return view('pages.Guest.myChallenges')->with('guestChallenges', $guestChallenges);

    }

    public function show($id) {
        
    }

    public function store(Request $request) {
        
    }


}
