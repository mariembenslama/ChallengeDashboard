<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index() {
        $sql = "select c.id, c.title, c.deadline, c.status, u.name 
                from challenges c, users u 
                where c.id = u.id order by c.created_at desc";
        $challenges = DB::select($sql);
        return view('pages.Challenge.challenges', compact('challenges'));
    }
}
