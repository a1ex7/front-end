@extends('app')

@section('tittle', 'Books List for User with ID: ' . $user_id)

@section('content')

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Genre</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->genre }}</td>

                <td>
                    <a href="{{ URL::to('books/' . $book->id) }}" class="btn btn-success btn-sm">Show</a>
                    <a href="{{ URL::to('books/' . $book->id . '/edit') }}" class="btn btn-info btn-sm">Edit</a>

                    {!! Form::open(
                        ['url' => 'users/'. $user_id . '/books/' . $book->id, 'class' => 'pull-right']
                    ) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Return the book', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $books->render() !!}

@stop