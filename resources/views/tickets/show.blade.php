@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$ticket->title}}</div>
                <div class="card-body">
                    {{$ticket->body}}
                </div>
                <div class="card-footer">
                    <div class="row">
                        <input type="button" class="btn btn-primary" value="Edit" onclick="location.href = '/tickets/{{$ticket->id}}/edit';">


                        <form action="/tickets/{{$ticket->id}}" method="post">
                            <input name="_method" type="hidden" value="delete">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>

                </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
        </div>
    </div>
</div>
@endsection