@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Admin Dashboard</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">username</th>
                        <th scope="col">roles</th>
                        <th scope="col">permissions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="align-middle">{{$user->username}}</td>
                            <td class="align-middle">
                                @foreach ($user->roles as $role)
                                    {{$role->name}},
                                @endforeach
                            </td>
                            <td class="align-middle">
                                @foreach ($user->roles as $role)
                                    @foreach ($role->permissions as $permission)
                                        {{$permission->name}} <br>
                                    @endforeach
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
