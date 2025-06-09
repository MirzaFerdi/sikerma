<!-- resources/views/dashboard.blade.php -->
@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <h3>Selamat Datang di Dashboard</h3>
        <p>Anda telah berhasil masuk sebagai {{ auth()->user()->role }}.</p>
    </div>
@endsection
