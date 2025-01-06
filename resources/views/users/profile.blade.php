@extends('layouts.book')

@section('content')
<div class="container" style="margin-top: 100px">
    <h1>My Profile</h1>

    <div class="card mb-4">
        <div class="card-header">
            Informasi Profil
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Dibuat Pada:</strong> {{ $user->created_at->format('d M Y') }}</p>
            <p><strong>Terakhir Update:</strong> {{ $user->updated_at->format('d M Y') }}</p>
        </div>
    </div>

    <a href="{{ route('users.edit', auth()->user()->id) }}" class="btn btn-warning">Edit Profil</a>


</div>
@endsection