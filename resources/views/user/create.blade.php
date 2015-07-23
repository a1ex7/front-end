@extends('app')

@section('tittle', 'Create User')


@section('content')

    {!! HTML::ul($errors->all()) !!}

    {!! Form::open(['url' => 'users']) !!}

    <div class="form-group">
        {!! Form::label('firstname', 'Firstname') !!}
        {!! Form::text('firstname', Input::old('firstname'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('lastname', 'Lastname') !!}
        {!! Form::text('lastname', Input::old('lastname'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'E-Mail') !!}
        {!! Form::text('email', Input::old('email'),  ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}

    {!! Form::close() !!}

@stop