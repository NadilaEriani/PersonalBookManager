<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $data['user'] = \App\Models\User::orderBy('name', 'asc')->get();
        return view('books.create', $data);
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required|string|max:100',
            'author' => 'required|string',
            'status' => 'required|in:sudah dibaca,sedang dibaca,ingin dibaca',
            'review' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'date_added' => 'required|date',
            'date_finished' => 'nullable|date',
        ]);

        $book = new Book(); //membuat objek kosong di variable model
        $book->fill($requestData); //mengisi var model dengan data yang sudah ada
        $book->save(); //menyimpan data ke database
        flash('Daftar Buku Berhasil di Tambahkan')->success();
        return redirect()->route('books.index');
    }

    public function edit(string $id)
    {
        $data['book'] = Book::findOrFail($id);
        return view('books.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'title' => 'required|string|max:100',
            'author' => 'required|string',
            'review' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'date_finished' => 'nullable|date',
        ]);
        $book = Book::findOrFail($id); //membuat objek kosong di variable model
        $book->fill($requestData); //mengisi var model dengan data yang sudah ada
        $book->save(); //menyimpan data ke database
        flash('Data berhasil di diupdate')->success();
        return redirect('/books');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
