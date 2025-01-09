@extends('layouts.book')

@section('content')
<div class="container" style="margin-top: 100px">
    <h1>Tambah Buku</h1>
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <!-- User ID (Hidden Input) -->
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div class="form-group">
            <label for="title">Judul Buku</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cover_image">Cover Buku</label>
            <input type="file" name="cover_image" class="form-control" accept="image/*">
            <small class="text-muted">Unggah foto buku (format: jpg, jpeg, png, max: 2MB).</small>
        </div>

        <div class="form-group">
            <label for="author">Penulis</label>
            <input type="text" name="author" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="ingin dibaca">Ingin Dibaca</option>
                <option value="sedang dibaca">Sedang Dibaca</option>
                <option value="sudah dibaca">Sudah Dibaca</option>
            </select>
        </div>
        <div class="form-group">
            <label for="genres">Genre</label>
            <select name="genres[]" id="genres" class="form-control select2" multiple="multiple" style="width: 100%;">
                @foreach ($genres as $item)
                    <option value="{{ $item->genre_id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <small class="text-muted">Pilih satu atau lebih genre untuk buku ini.</small>
        </div>
        <div class="form-group">
            <label for="review">Review</label>
            <textarea name="review" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="date_added">Tanggal Ditambahkan</label>
            <input type="date" id="date_added" name="date_added" class="form-control" required>
        </div>

        <script>
            // Mendapatkan elemen input
            const dateInput = document.getElementById('date_added');

            // Mendapatkan tanggal hari ini
            const today = new Date();
            const formattedDate = today.toISOString().split('T')[0]; // Mengambil format 'yyyy-MM-dd'

            // Mengatur nilai default
            dateInput.value = formattedDate;
        </script>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection