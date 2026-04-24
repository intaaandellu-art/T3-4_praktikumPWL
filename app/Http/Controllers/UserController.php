<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('loans')->get();
        return view('users.index', compact('users'));
    }
}
