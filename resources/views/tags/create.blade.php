@extends('layouts.app_modern')

@section('content')
    <h1>Tambah Tag Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tag_name" class="form-label">Nama Tag</label>
            <input type="text" name="tag_name" class="form-control" value="{{ old('tag_name') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('tags.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
