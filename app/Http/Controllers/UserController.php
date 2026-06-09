<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();

        return view('users.index', compact('users'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
        ]);

        $user = User::create($validated);

        if ($request->wantsJson()) {
            return response()->json($user, 201);
        }

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }


    public function create(): \Illuminate\Contracts\View\View
    {
        return view('users.create');
    }


    public function show(User $user)
    {
        return $user;
    }


    public function update(Request $request, User $user)
    {

        $user->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$request->password,
            "phone"=>$request->phone,
        ]);


        return $user;
    }


    public function destroy(User $user)
    {
        $user->delete();

        return [
            "message"=>"Deleted"
        ];
    }
}