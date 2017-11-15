<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function getUsers(){
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function editUser($id){
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }

    public function updateUser($id, Request $request){
        $user = User::findOrFail($id);

        $user->email = $request->email;
        $user->admin_flag = $request->admin_flag;
        $user->save();

        \Session::flash('flash_message', 'User successfully edited!');
        return redirect()->route('admin.users');
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users');
    }
}
