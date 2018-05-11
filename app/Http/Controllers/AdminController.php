<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }
}
