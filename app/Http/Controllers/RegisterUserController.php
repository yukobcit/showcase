<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class RegisterUserController extends Controller
{

    public function create() {
        return view('admin.users.create')
        ->with ('user', null);
    }
    public function store() {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:8','confirmed'],
        ]);

        // User::create($attributes);

        $user = User::create($attributes);
        auth()->login($user);
        return redirect('/admin');
    }

    public function edit(User $user) {
        return view('admin.users.create')
        ->with('user', $user);
        
    }


    public function update(User $user, Request $request) {
        $attributes = request()->validate([
            'name' => 'required',
            'email' =>  ['required','unique:users,email,'.$user->id],

            'password' => ['required','min:8','confirmed'],
    ]);

        $user->update($attributes);
        return redirect('/admin');
    }

    public function destroy(User $user) {
        $user->delete();

        // Set a flash message
        session()->flash('success','User Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }



}