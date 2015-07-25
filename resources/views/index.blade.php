@extends('app')

@section('tittle', 'Backbone App')

@section('content')

<div class="tab-content">
<div id="users" role="tabpanel" class="tab-pane active">
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E.Mail</th>
            <th>Actions</th>
        </tr>
        <tr>
            <td></td>
            <td><input class="form-control firstname-input"/></td>
            <td><input class="form-control lastname-input"/></td>
            <td><input class="form-control email-input"/></td>
            <td><button class="btn btn-primary add-user">Add</button></td>
        </tr>
        </thead>
        <tbody class="users-list"></tbody>
    </table>

    <script type="text/template" class="users-list-template">
        <td><span class="user-id"><%= id %></span></td>
        <td><span class="firstname"><%= firstname %></span></td>
        <td><span class="lastname"><%= lastname %></span></td>
        <td><span class="email"><%= email %></span></td>
        <td>
            <button class="btn btn-warning edit-user">Edit</button>
            <button class="btn btn-danger delete-user">Delete</button>
            <button class="btn btn-success update-user" style="display:none">Update</button>
            <button class="btn btn-danger cancel" style="display:none">Cancel</button>
        </td>
    </script>
</div>

<div id="books" role="tabpanel" class="tab-pane">
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Actions</th>
        </tr>
        <tr>
            <td></td>
            <td><input class="form-control title-input"/></td>
            <td><input class="form-control author-input"/></td>
            <td><input class="form-control genre-input"/></td>
            <td><button class="btn btn-primary add-book">Add</button></td>
        </tr>
        </thead>
        <tbody class="books-list"></tbody>
    </table>
    <script type="text/template" class="book-list-template">
        <td><span class="book-id"><%= id %></span></td>
        <td><span class="title"><%= title %></span></td>
        <td><span class="author"><%= author %></span></td>
        <td><span class="genre"><%= genre %></span></td>
        <td>
            <button class="btn btn-warning edit-book">Edit</button>
            <button class="btn btn-danger delete-book">Delete</button>
            <button class="btn btn-success update-book" style="display:none">Update</button>
            <button class="btn btn-danger cancel" style="display:none">Cancel</button>
        </td>
    </script>
</div>

</div>
@stop