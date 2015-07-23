@extends('app')

@section('tittle', 'Edit User')

@section('content')

    {!! HTML::ul($errors->all()) !!}

    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}

    <div class="form-group">
        {!! Form::label('firstname', 'Firstname') !!}
        {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('lastname', 'Lastname') !!}
        {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'E-Mail') !!}
        {!! Form::text('email', null,  ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Update', ['class' => 'btn btn-primary']); !!}

    {!! Form::close() !!}

@stop