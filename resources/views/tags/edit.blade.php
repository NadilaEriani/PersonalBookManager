@extends('layouts.book')

@section('content')
    <h1>Edit Tag</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tags.update', $tag->tag_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="tag_name" class="form-label">Nama Tag</label>
            <input type="text" name="tag_name" class="form-control" value="{{ old('tag_name', $tag->tag_name) }}" required>
        </div>
        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('tags.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
