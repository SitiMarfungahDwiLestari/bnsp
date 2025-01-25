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
                       <label class="form-label">Penulis</label>
                       <select name="penulis_id" class="form-control" required>
                           <option value="">Pilih Penulis</option>
                           @foreach($penulis as $p)
                               <option value="{{ $p->id }}">{{ $p->nama }}</option>
                           @endforeach
                       </select>
                   </div>

                   <div class="mb-3">
                       <label class="form-label">Judul Buku</label>
                       <input type="text" class="form-control" name="judul" required>
                   </div>

                   <div class="mb-3">
                       <label class="form-label">Tanggal Terbit</label>
                       <input type="date" class="form-control" name="published_date" required>
                   </div>

                   <button type="submit" class="btn btn-primary">Simpan</button>
                   <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
               </form>
           </div>
       </div>
   </div>
</body>
</html>
