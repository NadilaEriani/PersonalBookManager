@extends('layouts.book', ['title' => 'Edit Data Buku'])

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="card">
        <div class="card-header">Edit Data Buku: <b>{{ strtoupper($book->title) }}</b></div>
        <div class="card-body">
            <form action="{{ route('books.update', $book->book_id) }}" method="POST">
                @method('PUT')
                @csrf

                <!-- Judul Buku -->
                <div class="form-group mt-3">
                    <label for="title">Judul Buku</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        value="{{ old('title') ?? $book->title }}">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>

                <!-- Penulis -->
                <div class="form-group mt-3">
                    <label for="author">Penulis</label>
                    <input type="text" class="form-control @error('author') is-invalid @enderror" id="author"
                        name="author" value="{{ old('author') ?? $book->author }}">
                    <span class="text-danger">{{ $errors->first('author') }}</span>
                </div>

              <!-- Genre -->
             <!-- Genre -->
<div class="form-group mt-3">
    <label for="genres">Genre</label>
    <select name="genres[]" id="genres" class="form-control select2" multiple="multiple" style="width: 100%;">
        @foreach ($genres as $item)
            <option value="{{ $item->genre_id }}" 
                {{ $book->genres->pluck('genre_id')->contains($item->genre_id) ? 'selected' : '' }}>
                {{ $item->name }}
            </option>
        @endforeach
    </select>
    <small class="text-muted">Pilih satu atau lebih genre untuk buku ini.</small>
</div>

                <!-- Review -->
                <div class="form-group mt-3">
                    <label for="review">Review</label>
                    <textarea class="form-control @error('review') is-invalid @enderror" id="review"
                        name="review">{{ old('review') ?? $book->review }}</textarea>
                    <span class="text-danger">{{ $errors->first('review') }}</span>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary mt-4">UPDATE</button>
            </form>
        </div>
    </div>
</div>
@endsection

<script>
    $(document).ready(function () {
        $('#genres').select2();
    });
</script>