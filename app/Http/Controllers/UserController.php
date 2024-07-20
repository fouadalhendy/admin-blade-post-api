<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users=User::all();
        return view('admin.user',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function block(User $user)
    {
        $user->is_bocked=true;
        $user->save();
        return redirect()->route('user.index');
    }

 //unblck

    public function unblck(User $user)
    {
        $user->is_bocked=false;
        $user->save();
        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
