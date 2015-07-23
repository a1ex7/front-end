@extends('app')

@section('tittle', 'Show Book')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Title:</h3>
        </div>
        <div class="panel-body">
            {{$book->title}}
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Author:</h3>
        </div>
        <div class="panel-body">
            {{$book->author}}
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Year:</h3>
        </div>
        <div class="panel-body">
            {{$book->year}}
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Genre:</h3>
        </div>
        <div class="panel-body">
            {{$book->genre}}
        </div>
    </div>


@stop