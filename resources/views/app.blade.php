<!DOCTYPE html>
<html>
<head>
    <title>@yield('tittle')</title>
    {!! HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') !!}
</head>

<body>
    <!-- Navigation Menu -->
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <a class="navbar-brand" href="/">Backbone.js Page</a>
            <ul class="nav navbar-nav">
                {{--<li><a href="{{ URL::to('users') }}">All Users</a></li>--}}
                {{--<li><a href="{{ URL::to('users/create') }}">Create a User</a></li>--}}
                {{--<li><a href="{{ URL::to('books') }}">All Books</a></li>--}}
                {{--<li><a href="{{ URL::to('books/create') }}">Create a Book</a></li>--}}
            </ul>
        </div>
    </nav>


    <div class="container">

        <ul class="nav nav-pills">
            <li role="presentation" class="active"><a href="#users" data-toggle="pill">Users</a></li>
            <li role="presentation"><a href="#books" data-toggle="pill">Books</a></li>
        </ul>

        <h2> @yield('tittle') </h2>

        <!-- Main Content -->
        @yield('content')

    </div>

    <script src="{{ asset('js/vendor/jquery-1.11.3.min.js') }}"></script>
    {!! HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js') !!}
    <script src="{{ asset('js/vendor/underscore-min.js') }}"></script>
    <script src="{{ asset('js/vendor/backbone-min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>