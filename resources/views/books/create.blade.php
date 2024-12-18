@extends('layouts.book')

@section('content')
<div class="container" style="margin-top: 100px">
    <h1>Tambah Buku</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <!-- User ID (Hidden Input) -->
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
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
            <label for="genres">Genre</label>
            <select name="genres[]" id="genres" class="form-control select2" multiple="multiple" style="width: 100%;">
                @foreach ($genre as $item)
                    <option value="{{ $item->genre_id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <small class="text-muted">Pilih satu atau lebih genre untuk buku ini.</small>
        </div>
        <!-- <div class="form-group">
            <label for="genres">Genre</label>
            <select name="genres[]" class="form-control select2" multiple style="width: 100%">
                @foreach ($genre as $item)
                    <option value="{{ $item->genre_id }}" @if (is_array(old('genres')) && in_array($item->genre_id, old('genres'))) selected @endif>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">Pilih satu atau lebih genre untuk buku ini.</small>
        </div> -->
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
</div>
@endsection