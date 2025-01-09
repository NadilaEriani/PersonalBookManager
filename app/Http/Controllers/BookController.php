<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,genre_id',
            'review' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'date_added' => 'required|date',
            'date_finished' => 'nullable|date',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi foto
        ]);

        // Upload foto jika ada
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('covers', 'public'); // Simpan di storage/covers
            $requestData['cover_image'] = $path;
        }

        $book = new Book();
        $book->fill($requestData);
        $book->save();

        // Hubungkan buku dengan genre
        $book->genres()->attach($requestData['genres']);
        flash('Data buku berhasil ditambahkan')->success();
        return redirect()->route('books.index');
    }

    
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'title' => 'required|string|max:100',
            'author' => 'required|string',
            'review' => 'nullable|string',
            'genres' => 'nullable|array',
            'genres.*' => 'exists:genres,genre_id',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi foto
        ]);

        $book = Book::findOrFail($id);

        // Upload foto baru jika ada
        if ($request->hasFile('cover_image')) {
            // Hapus foto lama jika ada
            if ($book->cover_image && Storage::disk('public')->exists($book->cover_image)) {
                Storage::disk('public')->delete($book->cover_image);
            }

            // Simpan foto baru
            $path = $request->file('cover_image')->store('covers', 'public');
            $requestData['cover_image'] = $path;
        }

        $book->fill($requestData);
        $book->save();

        $book->genres()->sync($requestData['genres'] ?? []);
        flash('Data berhasil diperbarui')->success();
        return redirect()->route('books.index');
    }



    public function edit(string $id)
    {
        $data['book'] = Book::with('genres')->findOrFail($id); // Ambil data buku beserta genre yang terkait
        $data['genres'] = \App\Models\Genre::all(); // Ambil semua genre untuk opsi tambahan
        return view('books.edit', $data);
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
