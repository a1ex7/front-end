@extends('app')

@section('tittle', 'User List')

@section('content')

    <table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>E.Mail</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->firstname }}</td>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->email }}</td>

                <td width="450">
                    <a href="{{ URL::to('users/' . $user->id) }}" class="btn btn-success btn-sm">Show</a>
                    <a href="{{ URL::to('users/' . $user->id . '/edit') }}" class="btn btn-info btn-sm">Edit</a>
                    <a href="{{ URL::to('books/users/'. $user->id) }}" class="btn btn-primary btn-sm">Add book</a>

                    @if ( count($user->books) > 0)
                        <a href="{{ URL::to('users/' . $user->id . '/books') }}" class="btn btn-warning btn-sm">
                            Have {{ count($user->books) }} books
                        </a>
                    @endif

                    {!! Form::open( ['url' => 'users/'. $user->id, 'class' => 'pull-right'] ) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete this User', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
    </tbody>
    </table>

    {!! $users->render() !!}

@stop