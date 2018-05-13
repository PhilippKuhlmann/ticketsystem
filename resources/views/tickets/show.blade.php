@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Kunde</div>
                        <div class="card-body">
                            <b>{{$ticket->customer->name}}</b>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Ansprechpartner</div>
                        <div class="card-body">
                            <b>{{$ticket->employee->firstName}} {{$ticket->employee->lastName}}</b>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    #{{$ticket->id}}
                </div>
                <div class="card-body">
                    <h4>{{$ticket->title}}</h4>

                    <p>{{$ticket->body}}</p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <input type="button" class="btn btn-primary" value="Edit" onclick="location.href = '/tickets/{{$ticket->id}}/edit';">

                        @can('delete ticket')
                        <form action="/tickets/{{$ticket->id}}" method="post">
                            <input name="_method" type="hidden" value="delete">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @endcan
                    </div>

                </div>
            </div>
            <br>
            <form action="/ticket/{{$ticket->id}}/add/comment" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="comment">Text</label>
                    <textarea class="form-control" id="body" name="comment" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
            <br>
            @foreach ($ticket->comments->sortByDesc('created_at') as $comment)
                <div class="card">
                    <div class="card-body">
                        <p>{{$comment->body}}</p>
                    </div>
                    <div class="card-footer">
                        Von: {{$comment->user->username}} vor: {{$comment->created_at->diffForHumans()}}
                    </div>
                </div>
                <br>
            @endforeach
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Info</div>
                <div class="card-body">
                    Status: {{$ticket->status->name}} <br>
                    Priority: {{$ticket->priority->name}} <br>
                    Action: {{$ticket->action->name}} <br>
                    <hr>
                    Editor:{{$ticket->editor->firstName . ' ' . $ticket->editor->lastName}} <br>
                    Crator:{{$ticket->creator->firstName . ' ' . $ticket->creator->lastName}}
                    <hr>
                </div>
            </div>
            <form action="/ticket/{{$ticket->id}}/update/status" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status_id" required>
                        <option value="">Select please ...</option>
                        @foreach ($statuses as $status)
                            <option value="{{$status->id}}">{{$status->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">update</button>
            </form>
            <br>
            @foreach ($ticket->ticketFeeds->sortByDesc('created_at') as $feed)
                <div class="card">
                    <div class="card-body">
                        <p>{{$feed->feed}}</p>
                    </div>
                    <div class="card-footer">
                        wann: {{$feed->created_at->diffForHumans()}}
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    </div>







</div>
@endsection
