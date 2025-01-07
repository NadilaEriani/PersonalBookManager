@extends('layouts.book')

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Daftar Buku</h1>
        <p class="text-muted">Cari dan telusuri daftar buku favorit Anda berdasarkan judul, genre, atau penulis.</p>
    </div>

    <!-- Form Pencarian -->
    <form method="GET" action="{{ route('books.view') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control rounded-start"
                placeholder="Cari berdasarkan judul, genre, atau penulis" value="{{ request('search') }}">
            <button class="btn btn-primary rounded-end px-4" type="submit">Cari</button>
        </div>
    </form>

    <!-- Tabel Data Buku -->
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle shadow-sm">
            <thead class="bg-primary text-white">
                <tr>
                <tr>
                    <th class="fw-bold">No</th>
                    <th class="fw-bold">Judul</th>
                    <th class="fw-bold">Penulis</th>
                    <th class="fw-bold">Genre</th>
                    <th class="fw-bold">Review Buku</th>
                </tr>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-bold">{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>
                            @if ($book->genres->isEmpty())
                                <span class="text-muted">Tidak ada genre</span>
                            @else
                                @foreach ($book->genres as $genre)
                                    <span class="badge bg-secondary">{{ $genre->name }}</span>
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $book->review }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Tidak ada data buku ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $books->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection

<style>
    .book-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        margin-top: 20px;
    }

    .book-item {
        padding: 20px;
        margin: 10px 0;
        border-bottom: 1px solid #e0e0e0;
        width: 100%;
        max-width: 600px;
    }

    .book-title {
        font-size: 1.25rem;
        color: #343a40;
    }

    .book-author {
        font-size: 0.9rem;
    }

    .book-genres .badge {
        font-size: 0.85rem;
        padding: 6px 12px;
        border-radius: 12px;
        margin-right: 5px;
        margin-bottom: 5px;
        display: inline-block;
    }

    .book-review {
        font-size: 1rem;
        margin-top: 10px;
    }

    /* Tambahkan gaya untuk placeholder */
    input::placeholder {
        color: #f0f0f0;
        /* Warna lebih terang */
        font-style: italic;
        /* Opsional: membuat teks miring */
        opacity: 1;
        /* Pastikan opacity tidak memengaruhi warna */
    }
</style>