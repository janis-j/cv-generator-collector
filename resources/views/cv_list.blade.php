@extends('main')
@section('content')
    <div class="container">
        @if (count($users) !== 0)
            <table class="list_table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Phone number</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->surname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone_number}}</td>
                            <td>
                                <form action="/cv_view/{{$user->id}}" method="post" target="_blank">
                                    @csrf
                                    <button class="ripple" type="submit">View</button>
                                </form>
                            </td>
                            <td>
                                <form action="/cv_edit/{{$user->id}}" method="post">
                                    @csrf
                                    <button class="ripple" type="submit">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="/delete/{{$user->id}}" method="post">
                                    @csrf
                                    <button class="ripple" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div>
                <h3>Database is empty, to create and save new cv, click "New"</h3>
            </div>
        @endif
        <div>
            <form action="/cv_create" method="get">
                @csrf
                <button class="ripple" type="submit">New</button>
            </form>
        </div>
        <div class="list_pagination">
            {{ $users->links() }}
        </div>
    </div>

@stop

