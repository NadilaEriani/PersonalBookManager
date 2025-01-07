<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $totalBuku = Book::count();
        $bukuDibaca = Book::where('status', 'sudah dibaca')->count();
        $bukuSedangDibaca = Book::where('status', 'sedang dibaca')->count();
        $bukuBelumDibaca = Book::where('status', 'ingin dibaca')->count();

        $data = json_encode([
            'bukuDibaca' => $bukuDibaca,
            'bukuSedangDibaca' => $bukuSedangDibaca,
            'bukuBelumDibaca' => $bukuBelumDibaca
        ]);

        return view('home', compact('data'));
    }
    public function home()
    {
        $userId = Auth::id(); // Mendapatkan ID user yang sedang login
        $bukuDibaca = Book::where('user_id', $userId)->where('status', 'sudah dibaca')->count();
        $bukuSedangDibaca = Book::where('user_id', $userId)->where('status', 'sedang dibaca')->count();
        $bukuBelumDibaca = Book::where('user_id', $userId)->where('status', 'ingin dibaca')->count();

        $data = json_encode([
            'bukuDibaca' => $bukuDibaca,
            'bukuSedangDibaca' => $bukuSedangDibaca,
            'bukuBelumDibaca' => $bukuBelumDibaca,
        ]);

        return view('home', compact('data'));
    }

}
