@extends('layouts.book')

@section('content')
<div class="container" style="margin-top: 100px">
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
                <th>Foto</th>
                <th>Penulis</th>
                <th>Status</th>
                <th>genre</th>
                <th>Review Buku</th>
                <th>Tanggal Ditambahkan</th>
                <th>Selesai Membaca</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->title }}</td>
                    <td>
                        @if ($book->cover_image)
                            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover" width="50">
                        @else
                            <span>Tidak ada foto</span>
                        @endif
                    </td>
                    <td>{{ $book->author }}</td>
                    <td>
                        <form action="{{ route('books.updateStatus', $book->book_id) }}" method="POST"
                            id="statusForm-{{ $book->book_id }}">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-select status-dropdown"
                                onchange="document.getElementById('statusForm-{{ $book->book_id }}').submit();">
                                <option value="ingin dibaca" {{ $book->status == 'ingin dibaca' ? 'selected' : '' }}>Ingin
                                    Dibaca</option>
                                <option value="sedang dibaca" {{ $book->status == 'sedang dibaca' ? 'selected' : '' }}>Sedang
                                    Dibaca</option>
                                <option value="sudah dibaca" {{ $book->status == 'sudah dibaca' ? 'selected' : '' }}>Sudah
                                    Dibaca</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        @if ($book->genres->isEmpty())
                            <span class="text-muted">Tidak ada genre</span>
                        @else
                            @foreach ($book->genres as $genre)
                                <span class="badge bg-primary">{{ $genre->name }}</span>
                            @endforeach
                        @endif
                    </td>
                    <td>{{ $book->review }}</td>
                    <td>{{ \Carbon\Carbon::parse($book->date_added)->format('Y-m-d') }}</td>
                    <td>
                        <span id="date-read-{{ $book->book_id }}">
                            {{ $book->date_finished ? \Carbon\Carbon::parse($book->date_finished)->format('M d, Y') : 'Belum selesai' }}
                        </span>
                        <a href="javascript:void(0)" onclick="editDate('{{ $book->book_id }}')">[edit]</a>
                        <div id="edit-date-{{ $book->book_id }}" style="display:none;">
                            <form action="{{ route('books.updateDate', $book->book_id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <select name="year">
                                    @for ($year = now()->year; $year >= 2000; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                                <select name="month">
                                    @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $index => $month)
                                        <option value="{{ $index + 1 }}">{{ $month }}</option>
                                    @endforeach
                                </select>
                                <select name="day">
                                    @for ($day = 1; $day <= 31; $day++)
                                        <option value="{{ $day }}">{{ $day }}</option>
                                    @endfor
                                </select>
                                <button type="submit">Save</button>
                            </form>
                            <form action="{{ route('books.deleteDate', $book->book_id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus tanggal selesai membaca?')">Hapus</button>
                            </form>
                            <a href="javascript:void(0)" onclick="cancelEdit('{{ $book->book_id }}')">cancel</a>
                        </div>
                    </td>


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
</div>
@endsection

<script>
    function editDate(bookId) {
        document.getElementById(`date-read-${bookId}`).style.display = 'none';
        document.getElementById(`edit-date-${bookId}`).style.display = 'block';
    }

    function cancelEdit(bookId) {
        document.getElementById(`date-read-${bookId}`).style.display = 'block';
        document.getElementById(`edit-date-${bookId}`).style.display = 'none';
    }
</script>