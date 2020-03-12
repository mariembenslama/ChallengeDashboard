<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Participant;
class AdminController extends Controller
{
    public function index() {
        $sql = "select * from users u where u.role = 'guest'";
        $guests = DB::select($sql);
        $sql = "select * from users u where u.role = 'Admin'";
        $admins = DB::select($sql);
        $sql = "select * from users u where u.role = 'Participant'";
        $participants = DB::select($sql);
        $sql = "select * from users u where u.role = 'Organizer'";
        $organizers = DB::select($sql);
        return view('pages.Admin.Details', compact('guests', 'admins', 'participants', 'organizers'));
    }
    
    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return redirect('/authority')->with('success', 'User deleted');
    }

    public function update(Request $request, $id) {

        $this->validate($request ,[
            'role' => 'required',
        ]);

        $user = User::find($id);
        $user->role = $request->input('role');
        $user->save();
        return redirect('/challenges')->with('success', 'Role updated');
    
    }
}
