<?php

namespace App\Http\Controllers;

use App\Models\User; // Import model User
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Function untuk menampilkan semua user
    public function index()
    {
        // Ambil semua data user dari database
        $users = User::all();

        // Kirim data ke view
        return view('users.index', compact('users'));
    }
}
