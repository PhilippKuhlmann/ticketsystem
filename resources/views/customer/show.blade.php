@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{$customer->name}}</h1>
            <h2>Mitarbeiter</h2>
            <ul>
                @foreach ($customer->employees as $employee)
                    <li><a href="/employee/{{$employee->id}}">{{$employee->firstName . ' ' . $employee->lastName}}</a></li>
                @endforeach
            </ul>
            <h2>Tickets</h2>
            <ul>
                @foreach ($customer->tickets as $ticket)
                    <li><a href="/tickets/{{$ticket->id}}">{{$ticket->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
