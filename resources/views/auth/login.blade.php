@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center">
        <div class="col-md-5">
            <div class="card shadow border-0 rounded-lg">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">Selamat Datang Kembali!</h3>
                        <p class="text-muted">Silakan login untuk melanjutkan</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

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

                        <div class="d-flex justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                <label class="form-check-label text-muted" for="remember">Ingat saya</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-decoration-none">Lupa password?</a>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 mb-4">Login</button>

                        <p class="text-center text-muted">
                            Belum punya akun?
                            <a href="{{ route('register') }}" class="text-decoration-none">Daftar sekarang</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.input-group-text {
    background: transparent;
}
.form-control:focus {
    box-shadow: none;
    border-color: #0d6efd;
}
.btn-primary {
    border-radius: 5px;
}
</style>
@endsection
