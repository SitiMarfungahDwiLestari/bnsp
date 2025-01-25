<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Peminjaman Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1>Registrasi Peminjaman Buku</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('registrasi.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" required>
            </div>
            <div class="form-group mb-3">
                <label>Nomor Telepon</label>
                <input type="text" class="form-control" name="nomor_telepon" required>
            </div>
            <div class="form-group mb-3">
                <label>Agama</label>
                <select name="id_agama" class="form-control" required>
                    @foreach($agama as $d)
                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" required></textarea>
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        $('select[name="id_agama"]').select2({
            placeholder: 'Pilih agama',
            allowClear: true
        });
    });
    </script>
</body>
</html>
