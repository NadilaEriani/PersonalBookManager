@extends('layouts.app_modern')

@section('content')
    <h1>Data Buku</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Status</th>
                <th>genre</th>
                <th>Rating</th>
                <th>Tentang Buku</th>
                <th>Tanggal Ditambahkan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->status }}</td>
                    <td>
                        @if ($book->genres->isEmpty())
                            <span class="text-muted">Tidak ada genre</span>
                        @else
                            @foreach ($book->genres as $genre)
                                <span class="badge bg-primary">{{ $genre->name }}</span>
                            @endforeach
                        @endif
                    </td>
                    <td>{{ $book->rating }}</td>
                    <td>{{ $book->review }}</td>
                    <td>{{ $book->date_added }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book->book_id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('books.destroy', $book->book_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
