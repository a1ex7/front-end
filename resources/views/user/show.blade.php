@extends('app')

@section('tittle', 'Show User')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">First Name:</h3>
        </div>
        <div class="panel-body">
            {{$user->firstname}}
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Last Name:</h3>
        </div>
        <div class="panel-body">
            {{$user->lastname}}
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">E-Mail:</h3>
        </div>
        <div class="panel-body">
            {{$user->email}}
        </div>
    </div>

    @if (count($books))
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Have Books:</h3>
        </div>
        <div class="panel-body">
            @foreach($books as $book)
                {{ $book->title }} {{ $book->author }} ({{ $book->year }})
                <br />
            @endforeach
        </div>
    </div>
    @endif


@stop