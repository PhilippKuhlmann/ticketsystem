<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function verify($token)
    {
        User::where('verifyToken', $token)->firstOrFail()
            ->update(['verifyToken' => null]);

        return redirect('home')
            ->with('success', 'Acc verifyed');
    }
}
