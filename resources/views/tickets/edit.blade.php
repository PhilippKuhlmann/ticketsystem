@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="/tickets/{{$ticket->id}}" method="post">
                    <input name="_method" type="hidden" value="PUT">
                    {{ csrf_field() }}
                    <div class="card-header">Ticket Erstellen</div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="title">Betreff</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$ticket->title}}">
                        </div>

                        <div class="form-group">
                            <label for="body">Text</label>
                            <textarea class="form-control" id="body" name="body" rows="5">{{$ticket->body}}</textarea>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
