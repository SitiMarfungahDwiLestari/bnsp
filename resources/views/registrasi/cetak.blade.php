<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Cetak Kartu Registrasi</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <style>
       @page {
           size: portrait;
       }
       body {
           font-size: 18px;
           line-height: 1.6;
       }
       @media print {
           .no-print { display: none; }
       }
   </style>
</head>
<body>
   <div class="container mt-5">
       @if(session('error'))
           <div class="alert alert-danger">
               {{ session('error') }}
           </div>
       @endif

       @if(isset($registrasi))
           <div class="row justify-content-center">
               <div class="col-md-8">
                   <div class="card shadow-sm">
                       <div class="card-header bg-primary text-white">
                           <h4 class="mb-0">Detail Pendaftaran</h4>
                       </div>
                       <div class="card-body">
                           <table class="table table-bordered">
                               <tr>
                                   <th style="width:30%">ID Pendaftaran</th>
                                   <td>{{ $registrasi->id }}</td>
                               </tr>
                               <tr>
                                   <th>Nama</th>
                                   <td>{{ $registrasi->nama }}</td>
                               </tr>
                               <tr>
                                   <th>Email</th>
                                   <td>{{ $registrasi->email }}</td>
                               </tr>
                               <tr>
                                   <th>Tanggal Lahir</th>
                                   <td>{{ $registrasi->tanggal_lahir->format('d/m/Y') }}</td>
                               </tr>
                               <tr>
                                   <th>No. HP</th>
                                   <td>{{ $registrasi->nomor_telepon }}</td>
                               </tr>
                               <tr>
                                   <th>Agama</th>
                                   <td>{{ $registrasi->agama->nama }}</td>
                               </tr>
                               <tr>
                                   <th>Alamat</th>
                                   <td>{{ $registrasi->alamat }}</td>
                               </tr>
                               <tr>
                                   <th>Tanggal Daftar</th>
                                   <td>{{ $registrasi->created_at->format('d/m/Y H:i') }}</td>
                               </tr>
                           </table>
                       </div>
                       <div class="card-footer text-center no-print">
                            <button onclick="window.print()" class="btn btn-primary btn-lg me-3">Cetak Kartu</button>
                            <a href="{{ route('registrasi.cetak', ['id' => $registrasi->id, 'download' => 'pdf']) }}" class="btn btn-success btn-lg">Download PDF</a>
                   </div>
               </div>
           </div>
       @else
           <div class="alert alert-danger">
               Data registrasi tidak dapat ditemukan. Silahkan hubungi administrator.
           </div>
       @endif
   </div>
</body>
</html>
