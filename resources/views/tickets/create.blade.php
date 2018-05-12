@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="/tickets" method="post">
                    {{ csrf_field() }}
                    <div class="card-header">Ticket Erstellen</div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="customer">Customer</label>
                            <select class="form-control" id="customer" name="customer_id">
                                <option value="">Select please ...</option>
                                @foreach ($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="employee">Ansprechpartner</label>
                            <select class="form-control" id="employee" name="employee_id">
                                <option value="">Select please ...</option>
                                @foreach ($employees as $employee)
                                    <option value="{{$employee->id}}">{{$employee->firstName . ' ' . $employee->lastName}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Betreff</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Betreff">
                        </div>

                        <div class="form-group">
                            <label for="body">Text</label>
                            <textarea class="form-control" id="body" name="body" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="editor">Bearbeiter</label>
                            <select class="form-control" id="editor" name="editor_id">
                                <option value="">Select please ...</option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->firstName . ' ' . $user->lastName}}</option>
                                @endforeach
                            </select>
                        </div>




                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Erstllen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
