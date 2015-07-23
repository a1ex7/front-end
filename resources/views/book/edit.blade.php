@extends('app')

@section('tittle', 'Edit Book')

@section('content')

    {!! HTML::ul($errors->all()) !!}

    {!! Form::model($book, ['route' => ['books.update', $book->id], 'method' => 'PUT']) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('author', 'Author') !!}
        {!! Form::text('author', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('year', 'Year') !!}
        {!! Form::text('year', null,  ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('genre', 'Genre') !!}
        {!! Form::text('genre', null,  ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}

    {!! Form::close() !!}

@stop