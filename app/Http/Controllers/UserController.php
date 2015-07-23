<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Book;


class UserController extends Controller
{
    /**
     * Display a listing of the Users.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::with('books')->paginate(10);

        return view('user/index', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('user/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $rules = array(
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'email' => 'required|email|unique:users',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return Redirect::to('users/create')
                ->withErrors($validator)
                ->withInput();
        }
        else {

            $user = new User();

            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;

            $user->save();

            Session::flash('message', 'New User successfully created');

            return Redirect::to('users');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $books = $user->books()->get();
        return view('user/show', ['user' => $user, 'books' => $books]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user/edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha',
            'email' => 'required|email',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return Redirect::to('users/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }
        else {

            $user = User::find($id);

            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;

            $user->save();

            Session::flash('message', 'New User successfully updated');

            return Redirect::to('users');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Session::flash('message', 'Deleted User with ID: ' . $id);

        return Redirect::to('users');
    }
}
