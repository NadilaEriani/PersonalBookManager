<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Ambil ID user yang login
        $books = Book::where('user_id', $userId)->get();

        return view('books.index', ['books' => $books]);
    }

    public function create()
    {
        $data['user'] = \App\Models\User::orderBy('name', 'asc')->get();
        $data['genres'] = \App\Models\Genre::orderBy('name', 'asc')->get();
        return view('books.create', $data);
    }

    public function store(Request $request)
    {
        // Validasi input
        $requestData = $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required|string|max:100',
            'author' => 'required|string',
            'status' => 'required|in:sudah dibaca,sedang dibaca,ingin dibaca',
            'genres' => 'required|array', // Genres harus berupa array
            'genres.*' => 'exists:genres,genre_id', // Pastikan setiap genre_id valid
            'review' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'date_added' => 'required|date',
            'date_finished' => 'nullable|date',
        ]);
        $book = new Book(); // Membuat objek buku
        $book->fill($requestData); // Mengisi data buku kecuali genre
        $book->save(); // Menyimpan data buku ke database

        // Hubungkan buku dengan genre di tabel pivot
        $book->genres()->attach($requestData['genres']);
        flash('Data buku Berhasil di Tambahkan')->success();
        return redirect()->route('books.index');
    }


    public function edit(string $id)
    {
        $data['book'] = Book::with('genres')->findOrFail($id); // Ambil data buku beserta genre yang terkait
        $data['genres'] = \App\Models\Genre::all(); // Ambil semua genre untuk opsi tambahan
        return view('books.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'title' => 'required|string|max:100',
            'author' => 'required|string',
            'review' => 'nullable|string',
            'genres' => 'nullable|array', // Genres bisa kosong
            'genres.*' => 'exists:genres,genre_id', // Validasi setiap genre
        ]);

        // Cari buku berdasarkan ID
        $book = Book::findOrFail($id);

        // Update hanya field yang diubah
        $book->title = $requestData['title'];
        $book->author = $requestData['author'];
        $book->review = $requestData['review'];
        $book->user_id = $book->user_id; // Pastikan user_id tidak berubah
        $book->save();

        // Update genre melalui relasi pivot
        $book->genres()->sync($requestData['genres'] ?? []); // Jika genre kosong, relasi juga kosong

        flash('Data berhasil diperbarui')->success();
        return redirect()->route('books.index');
    }

    public function updateStatus(Request $request, Book $book)
    {
        // Validasi input status
        $validated = $request->validate([
            'status' => 'required|in:ingin dibaca,sedang dibaca,sudah dibaca',
        ]);

        // Perbarui status buku
        $book->status = $validated['status'];
        $book->save();

        // Redirect ke halaman daftar buku dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Status buku berhasil diperbarui.');
    }


    public function updateDate(Request $request, Book $book)
    {
        $request->validate([
            'year' => 'required|integer|min:2000|max:' . now()->year,
            'month' => 'required|integer|min:1|max:12',
            'day' => 'required|integer|min:1|max:31',
        ]);

        $book->date_finished = \Carbon\Carbon::create($request->year, $request->month, $request->day);
        $book->save();

        return redirect()->route('books.index')->with('success', 'Tanggal selesai membaca berhasil diperbarui.');
    }
    public function deleteDate(Request $request, Book $book)
    {
        // Hapus tanggal selesai membaca
        $book->date_finished = null;
        $book->save();

        return redirect()->route('books.index')->with('success', 'Tanggal selesai membaca berhasil dihapus.');
    }

    public function show(Request $request)
    {
        $query = Book::query();

        // Logika pencarian
        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('author', 'like', "%{$search}%")
                ->orWhereHas('genres', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
        }

        // Ambil data buku dengan relasi genre
        $books = $query->with('genres')->paginate(10);

        return view('books.view', compact('books'));
    }

    public function filterByGenre($genre)
    {
        $books = Book::whereHas('genres', function ($query) use ($genre) {
            $query->where('name', $genre);
        })->with('genres')->paginate(10);

        return view('books.view', compact('books'));
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
