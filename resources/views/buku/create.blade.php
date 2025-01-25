<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tambah Buku</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <div class="container mt-5">
       <div class="card">
           <div class="card-body">
               <h5 class="card-title">Tambah Buku Baru</h5>

               <form action="{{ route('buku.store') }}" method="POST">
                   @csrf
                   <div class="mb-3">
                       <label class="form-label">Judul Buku</label>
                       <input type="text" class="form-control @error('judul') is-invalid @enderror"
                              name="judul" value="{{ old('judul') }}" required>
                       @error('judul')
                           <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                   </div>

                   <div class="mb-3">
                       <label class="form-label">Penulis</label>
                       <input type="text" class="form-control @error('penulis') is-invalid @enderror"
                              name="penulis" value="{{ old('penulis') }}" required>
                       @error('penulis')
                           <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                   </div>

                   <div class="mb-3">
                       <label class="form-label">Penerbit</label>
                       <input type="text" class="form-control @error('penerbit') is-invalid @enderror"
                              name="penerbit" value="{{ old('penerbit') }}" required>
                       @error('penerbit')
                           <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                   </div>

                   <div class="mb-3">
                       <label class="form-label">Tahun Terbit</label>
                       <input type="text" class="form-control @error('tahun_terbit') is-invalid @enderror"
                              name="tahun_terbit" value="{{ old('tahun_terbit') }}" required>
                       @error('tahun_terbit')
                           <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                   </div>

                   <div class="mb-3">
                       <label class="form-label">Stok</label>
                       <input type="number" class="form-control @error('stok') is-invalid @enderror"
                              name="stok" value="{{ old('stok') }}" required>
                       @error('stok')
                           <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                   </div>

                   <button type="submit" class="btn btn-primary">Simpan</button>
                   <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
               </form>
           </div>
       </div>
   </div>
</body>
</html>
