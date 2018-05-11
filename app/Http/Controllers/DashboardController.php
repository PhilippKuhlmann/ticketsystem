<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketsToEdit = Ticket::where('editor_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        $ticketsCreated = Ticket::where('creator_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        return view('dashboard.index', compact('ticketsToEdit', 'ticketsCreated'));
    }
}
