@extends('layouts.book')

@section('content')
    <h1>Daftar Tags</h1>
    <a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">Tambah Tag</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($tags->isEmpty())
        <p>Tidak ada tag yang tersedia.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tag</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tag->tag_name }}</td>
                        <td>
                            <a href="{{ route('tags.edit', $tag->tag_id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tags.destroy', $tag->tag_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus tag ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
