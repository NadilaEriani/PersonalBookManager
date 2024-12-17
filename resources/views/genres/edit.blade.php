@extends('layouts.book')

@section('content')
    <h1>Edit Genre</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('genres.update', $genre->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama Genre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $genre->name) }}" required>
        </div>
        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
