<!-- resources/views/buku/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Buku</h5>

                <form action="{{ route('buku.update', $buku->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Penulis</label>
                        <select name="penulis_id" class="form-control" required>
                            @foreach($penulis as $p)
                                <option value="{{ $p->id }}" {{ $buku->penulis_id == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul" value="{{ $buku->judul }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Tanggal Terbit</label>
                        <input type="date" class="form-control" name="published_date" value="{{ $buku->published_date }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
