<?php

namespace App\Http\Controllers;

use App\User;
use App\Action;
use App\Status;
use App\Ticket;
use App\Customer;
use App\Employee;
use App\Priority;
use App\TicketFeed;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::orderBy('created_at', 'DESC')->get();

        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::role('user')->get();
        $customers = Customer::all();
        $employees = Employee::all();
        $priorities = Priority::all();
        $actions = Action::all();

        return view('tickets.create', compact('users', 'customers', 'employees', 'priorities', 'actions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ticket::create([
            'title' => $request->title,
            'body' => $request->body,
            'creator_id' => auth()->user()->id,
            'editor_id' => $request->editor_id,
            'customer_id' => $request->customer_id,
            'employee_id' => $request->employee_id,
            'status_id' => Status::where('name', 'offen')->first()->id,
            'priority_id' => $request->priority_id,
            'action_id' => $request->action_id,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $statuses = Status::all();

        return view('tickets.show', compact('ticket', 'statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $ticket->title = $request->title;
        $ticket->body = $request->body;
        $ticket->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect('/');
    }

    public function updateStatus(Request $request, Ticket $ticket)
    {
        $ticket->status_id = $request->status_id;
        $ticket->save();

        $feed = 'Status update auf '.$ticket->status->name;

        TicketFeed::create([
            'ticket_id' => $ticket->id,
            'feed' => $feed,
        ]);

        return redirect('/tickets/'.$ticket->id);
    }

    public function addComment(Request $request, Ticket $ticket)
    {
        $ticket->comments()->create([
            'body' => $request->comment,
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/tickets/'.$ticket->id);
    }
}
