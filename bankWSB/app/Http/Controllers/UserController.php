<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('usercontrol', compact('users'));
    }

    public function edit(User $user)
    {
        return view('useredit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        session()->flash("success_user_{$user->id}", "Dane użytkownika {$user->name} zostały zaktualizowane.");
        return redirect('usercontrol', 302);
    }
    public function create()
    {
        return view('usercreate');
    }
    public function store(Request $request)
    {
        // Walidacja danych
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Tworzenie nowego użytkownika
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        session()->flash("success_user_{$user->id}", "Nowy użytkownik został dodany.");
        return redirect('usercontrol', 302);
    }
}
