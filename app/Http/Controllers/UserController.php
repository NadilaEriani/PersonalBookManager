<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function showProfile(): View
    {
        $user = Auth::user(); // Menggunakan Facades Auth
        return view('users.profile', compact('user'));

    }


    public function edit($id): View
    {
        $user = User::findOrFail($id);

        if (Auth::id() !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
        ]);

        $user->name = $data['name'];
        $user->email = $data['email'];

        if ($data['password']) {
            $user->password = bcrypt($data['password']);
        }

        $user->save();

        return redirect()->route('users.profile')->with('success', 'Profil berhasil diperbarui!');
    }

}
