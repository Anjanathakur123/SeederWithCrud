<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('user', compact('roles'));
    }

    public function userData()
    {

        $users = User::with('role')->paginate(5);
        return view('allData', compact('users'));
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        $roles = Role::all();
        return view('edit', compact('users', 'roles'));
    }

    public function update(UserRequest $request, $id)
    {
        try {

            $data = [
                'name' => $request['name'],
                'email'=> $request['email'],
                'role_id'=> $request['role_id'],
                'city'   => $request['city']
            ];
              User::where('id', $id)->update($data);
            return redirect('/userData')->with('success', 'User updated successfully');
    }
    catch (\exception $ex) {
        return response()->back()->with('error', $ex->getMessage());
    }
}


    public function store(UserRequest $request)
    {
        try {
            $user = User::create($request->all());

            return redirect('/userData')->with('success', 'Registration Successful');
        }
        catch (\exception $ex) {

            return response()->back()->with('error', $ex->getMessage());
        }
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return back()->withSuccess('Category Deleted!!');
    }
}

