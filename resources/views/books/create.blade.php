@extends('layouts.app_modern')

@section('content')
    <h1>Tambah Buku</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">Username</label>
            <select name="user_id" class="form-control" style="width: 100%">
                <option value="">-- Pilih username --</option>
                @foreach ($user as $item)
                    <option value="{{ $item->id }}" @selected(old('user_id') == $item->id)>
                        {{ $item->name }} - {{ $item->email }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Judul Buku</label>
            <input type="text" name="title" class="form-control" required>
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
            <label for="review">Review</label>
            <textarea name="review" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" name="rating" class="form-control" min="1" max="5">
        </div>
        <div class="form-group">
            <label for="date_added">Tanggal Ditambahkan</label>
            <input type="datetime-local" name="date_added" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date_finished">Tanggal Selesai Dibaca</label>
            <input type="datetime-local" name="date_finished" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
