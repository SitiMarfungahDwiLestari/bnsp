@extends('layouts.app')
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
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(auth()->user()->role == 'peminjam')
                <a href="{{ route('peminjaman.create') }}" class="btn btn-primary btn-sm">Tambah Peminjaman</a>
            @endif
            <hr>
            <div class="card">
                <div class="card-header">Riwayat Peminjaman</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjaman as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->buku->judul }}</td>
                                <td>{{ $p->tanggal_pinjam }}</td>
                                <td>{{ $p->tanggal_kembali }}</td>
                                <td>
                                    <span class="badge bg-{{ $p->status == 'dipinjam' ? 'warning' : 'success' }}">
                                        {{ $p->status }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('peminjaman.cetak', $p->id) }}"
                                           target="_blank"
                                           class="btn btn-info btn-sm">Print</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
