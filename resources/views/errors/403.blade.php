@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h1 class="display-4">403</h1>
    <p class="lead">Anda tidak memiliki akses ke halaman ini.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Halaman Utama</a>
</div>
@endsection
