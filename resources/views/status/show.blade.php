@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul>
                @foreach ($tickets as $ticket)
                    <li><a href="/tickets/{{$ticket->id}}">{{$ticket->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
