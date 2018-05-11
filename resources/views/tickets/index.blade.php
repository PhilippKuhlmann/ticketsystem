@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>All Tickets</h1>
            @foreach ($tickets as $ticket)
                <div class="card">
                    <div class="card-header"><a href="/tickets/{{$ticket->id}}">{{$ticket->title}}</a> von: {{$ticket->creator->firstName . ' ' . $ticket->creator->lastName}}</div>
                    <div class="card-body">
                        {{$ticket->body}}
                    </div>
                    <div class="card-footer">
                        {{$ticket->created_at->diffForHumans()}}
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    </div>
</div>
@endsection
