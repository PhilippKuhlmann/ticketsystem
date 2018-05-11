@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>To Edit</h1>
            @foreach ($ticketsToEdit as $ticket)
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
        <div class="col-md-8">
            <h1>Created</h1>
            @foreach ($ticketsCreated as $ticket)
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
