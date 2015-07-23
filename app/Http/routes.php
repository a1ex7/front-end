<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', 'UserController');

Route::resource('books', 'BookController');

// Route for list of book which having some user with id
Route::get('users/{id}/books', 'BookController@usersbooks');

// Route for returning the book
Route::delete('users/{uid}/books/{bid}', 'BookController@returnBook');

// Route to list for adding books to user with id
Route::get('books/users/{id}', 'BookController@listAddingBook');

// Route to store books to user with id
Route::get('users/{uid}/books/{bid}', 'BookController@addBook');
