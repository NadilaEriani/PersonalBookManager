@extends('layouts.app_modern', ['title' => 'Edit Data Buku'])

@section('content')
    <div class="card">
        <div class="card-header">Edit Data Buku: <b>{{ strtoupper($book->title) }}</b></div>
        <div class="card-body">
            <form action="{{ route('books.update', $book->book_id) }}" method="POST">
                @method('PUT')
                @csrf

                <!-- Judul Buku -->
                <div class="form-group mt-3">
                    <label for="title">Judul Buku</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title') ?? $book->title }}">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>

                <!-- Penulis -->
                <div class="form-group mt-3">
                    <label for="author">Penulis</label>
                    <input type="text" class="form-control @error('author') is-invalid @enderror" id="author"
                        name="author" value="{{ old('author') ?? $book->author }}">
                    <span class="text-danger">{{ $errors->first('author') }}</span>
                </div>

                <!-- Review -->
                <div class="form-group mt-3">
                    <label for="review">Review</label>
                    <textarea class="form-control @error('review') is-invalid @enderror" id="review" name="review">{{ old('review') ?? $book->review }}</textarea>
                    <span class="text-danger">{{ $errors->first('review') }}</span>
                </div>

                <!-- Rating -->
                <div class="form-group mt-3">
                    <label for="rating">Rating</label>
                    <input type="number" class="form-control @error('rating') is-invalid @enderror" id="rating"
                        name="rating" value="{{ old('rating') ?? $book->rating }}" min="1" max="5">
                    <span class="text-danger">{{ $errors->first('rating') }}</span>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary mt-4">UPDATE</button>
            </form>
        </div>
    </div>
@endsection
