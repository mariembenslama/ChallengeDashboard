<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;
use App\Participant;

class GuestController extends Controller
{
    public function index() {
        $guestChallenges = Participant::where('idGuest', 1)
                            ->orderBy('submittedAt', 'desc')
                            ->paginate(10);
        return view('pages.Guest.myChallenges')->with('guestChallenges', $guestChallenges);
    }

    public function show($idGuest) {
        
    }

    public function store(Request $request) {
        
    }


}
