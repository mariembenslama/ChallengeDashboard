<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends OrganizerController
{

    public function index() {
        $guests = Guest::orderBy('createdAt', 'desc')->paginate(10);
        return view('pages.Admin.listGuests')->with('guests', $guests);
    }

    public function show($idGuest) {
        $guest = Guest::find($idGuest);
        return view('pages.Admin.guestDetails')->with('guest', $guest);
    }
    
    public function store(Request $request) {
        
    }


}
