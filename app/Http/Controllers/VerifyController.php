<?php

namespace App\Http\Controllers;

use App\User;

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
