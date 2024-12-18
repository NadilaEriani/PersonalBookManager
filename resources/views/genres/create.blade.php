@extends('layouts.book')

@section('content')
<div class="container" style="margin-top: 100px">
    <h1>Tambah Genre Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('genres.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Genre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
<script>
    $(document).ready(function () {
        $('#genres').select2({
            placeholder: "Pilih satu atau lebih genre", // Teks petunjuk saat kosong
            allowClear: true // Opsi untuk menghapus pilihan
        });
    });
</script>
@endsection