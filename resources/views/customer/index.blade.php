@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Customers</h1>
            <ul>
                @foreach ($customers as $customer)
                    <li><a href="/customer/{{$customer->id}}">{{$customer->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
