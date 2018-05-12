@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Statuses</h1>
                <a href="/admin/status/create" class="btn btn-default">Status erstellen</a>
            <ul>
                @foreach ($statuses as $status)
                    <li><a href="/tickets/status/{{$status->id}}">{{$status->name}}</a></li>
                @endforeach
            </ul>
            <form action="/admin/status" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" name="status" placeholder="StatusName" required>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
