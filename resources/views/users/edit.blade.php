@extends('layouts.book')

@section('content')
<div class="container" style="margin-top: 100px">
    <h1>Edit Profil</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $user->name) }}"
                required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $user->email) }}"
                required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password Baru (Opsional)</label>
            <input type="password" name="password" class="form-control" id="password"
                placeholder="Kosongkan jika tidak ingin mengubah password">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('users.profile') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection