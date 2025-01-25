<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
</head>
<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid px-4">
        <a class="navbar-brand text-white" href="/">Laravel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/penulis') }}">Data Penulis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/buku') }}">Data Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white bg-danger rounded px-3" href="{{ url('/registrasi') }}">Registrasi</a>
                </li>
            </ul>

            @if (Route::has('login'))
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/home') }}">Home</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            @endif
        </div>
    </div>
</nav>
<body>
    <div class="container">
        <h2>Data Buku Datatable</h2>
        @if (Session::has('pesan'))
            <div class="alert alert-success">
                {{ Session::get('pesan') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <a href="{{ route('buku.create') }}" class="mb-3 btn btn-primary float-end">Tambah Buku</a>
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th width="1">ID</th>
                            <th>Penulis</th>
                            <th>Judul</th>
                            <th>Publisher Date</th>
                            <th width="1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $buku)
                        <tr>
                            <td>{{ $buku->id }}</td>
                            <td>{{ $buku->penulis->nama }}</td>
                            <td>{{ $buku->judul }}</td>
                            <td>{{ $buku->published_date }}</td>
                            <td>
                                <div class="gap-2 d-flex">
                                    <a href={{ route('buku.edit', $buku -> id) }} class="btn btn-warning btn-sm">Edit</a>
                                    <div>
                                        <form action="{{ route('buku.destroy', $buku -> id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Yakin mau dihapus?')"
                                            type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('penulis.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
    <script>
        new DataTable('.datatable'); // menggunakan class
    </script>
</body>
</html>
