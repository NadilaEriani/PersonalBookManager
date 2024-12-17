@extends('layouts.book')

@section('content')
    <h1>Daftar Genre</h1>
    <a href="{{ route('genres.create') }}" class="btn btn-primary mb-3">Tambah Genre</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($genres->isEmpty())
        <p>Tidak ada genre yang tersedia.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Genre</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $genre->name }}</td>
                        <td>
                            <a href="{{ route('genres.edit', $genre->genre_id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('genres.destroy', $genre->genre_id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus genre ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
