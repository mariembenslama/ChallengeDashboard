<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
            $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $sql = "select u.role from users u where id=$id";
        $role = DB::select($sql);
        $sql = "select c.id, c.title, c.deadline, c.status, 
        u.name  
        from challenges c, users u 
        where c.status = TRUE and c.organizer_id = u.id order by c.created_at desc";
        $ongoing = DB::select($sql);
        return view('home', compact('role', 'ongoing'));
    }
}
