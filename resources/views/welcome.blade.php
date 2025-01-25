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
                        url('/api/placeholder/1920/600') center/cover no-repeat;
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
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                                </li>
                            @endif
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
            <h2 class="text-center mb-5">Buku Terpopuler</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card book-card">
                        <img src="/api/placeholder/400/500" class="card-img-top book-cover" alt="Book Cover">
                        <div class="card-body">
                            <h5 class="card-title">Laskar Pelangi</h5>
                            <p class="card-text text-muted">Andrea Hirata</p>
                        </div>
                    </div>
                </div>
                <!-- Tambahkan card buku lainnya -->
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
