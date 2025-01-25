<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                    url('{{ asset('images/hero.jpeg') }}') center/cover no-repeat;
            height: 60vh;
            color: white;
            display: flex;
            align-items: center;
            text-align: center;
        }
        .feature-card {
            transition: transform 0.3s;
            cursor: pointer;
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
        .book-card {
            height: 100%;
            transition: transform 0.3s;
        }
        .book-card:hover {
            transform: scale(1.03);
        }
        .book-cover {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">📚 Perpustakaan Digital</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/buku') }}" class="nav-link">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Login</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-3 mb-4">Selamat Datang di Perpustakaan Digital</h1>
            <p class="lead mb-4">Temukan ribuan buku digital untuk menambah wawasan Anda</p>
            @guest
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Daftar Sekarang</a>
            @endguest
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Keunggulan Kami</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card h-100 text-center p-4">
                        <div class="card-body">
                            <h1>📚</h1>
                            <h5 class="card-title">Koleksi Lengkap</h5>
                            <p class="card-text">Ribuan judul buku dari berbagai kategori tersedia untuk Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card h-100 text-center p-4">
                        <div class="card-body">
                            <h1>🔍</h1>
                            <h5 class="card-title">Pencarian Mudah</h5>
                            <p class="card-text">Temukan buku yang Anda cari dengan sistem pencarian canggih.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card h-100 text-center p-4">
                        <div class="card-body">
                            <h1>📱</h1>
                            <h5 class="card-title">Akses 24/7</h5>
                            <p class="card-text">Baca dan pinjam buku kapanpun dan dimanapun Anda berada.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Books -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Koleksi Buku Perpustakaan</h2>
            <div class="row g-4">
                @foreach($bukus as $buku)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-primary rounded-pill">Kode: {{ $buku->id }}</span>
                                <span class="badge bg-{{ $buku->stok > 0 ? 'success' : 'danger' }} rounded-pill">
                                    Stok: {{ $buku->stok }}
                                </span>
                            </div>
                            <h5 class="card-title text-primary">{{ $buku->judul }}</h5>
                            <div class="mb-3">
                                <small class="text-muted">
                                    <i class="bi bi-person"></i> {{ $buku->penulis }}
                                </small>
                            </div>
                            <p class="card-text">
                                <small class="text-muted">
                                    <i class="bi bi-building"></i> Penerbit: {{ $buku->penerbit }}
                                </small>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">
                                    <i class="bi bi-calendar"></i> Tahun Terbit: {{ $buku->tahun_terbit }}
                                </small>
                            </p>

                            @auth
                                @if(auth()->user()->role == 'peminjam' && $buku->stok > 0)
                                    <div class="mt-3 d-grid gap-2">
                                        <a href="{{ route('peminjaman.create') }}"
                                           class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-bookmark-plus"></i> Pinjam Buku
                                        </a>
                                    </div>
                                @elseif(auth()->user()->role == 'admin')
                                    <div class="mt-3 d-flex gap-2">
                                        <a href="{{ route('buku.edit', $buku->id) }}"
                                           class="btn btn-warning btn-sm flex-grow-1">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('buku.destroy', $buku->id) }}"
                                              method="POST" class="flex-grow-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-danger btn-sm w-100"
                                                    onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @else
                                <div class="mt-3 d-grid">
                                    <a href="{{ route('login') }}"
                                       class="btn btn-light btn-sm">
                                        <i class="bi bi-box-arrow-in-right"></i> Login untuk Meminjam
                                    </a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Perpustakaan Digital</h5>
                    <p>Menyediakan akses mudah ke dunia literasi digital.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">© 2024 Perpustakaan Digital. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
