@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center py-5">
        <div class="col-md-6">
            <div class="card shadow border-0 rounded-lg">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">Daftar Akun Baru</h3>
                        <p class="text-muted">Isi form berikut untuk membuat akun</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label text-muted">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" name="name" class="form-control border-start-0 @error('name') is-invalid @enderror"
                                       value="{{ old('name') }}" required placeholder="Masukkan nama lengkap">
                            </div>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" name="email" class="form-control border-start-0 @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" required placeholder="Masukkan email">
                            </div>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" name="password" class="form-control border-start-0 @error('password') is-invalid @enderror"
                                       required placeholder="Masukkan password">
                            </div>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-muted">Konfirmasi Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                                <input type="password" name="password_confirmation" class="form-control border-start-0"
                                       required placeholder="Konfirmasi password">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 mb-4">Daftar</button>

                        <p class="text-center text-muted">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
