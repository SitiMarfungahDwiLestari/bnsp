@extends('layouts.app')
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
<div class="container mt-5">
    @if(isset($peminjaman))
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Detail Peminjaman Buku</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width:30%">Nama Peminjam</th>
                                <td>{{ $peminjaman->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $peminjaman->user->email }}</td>
                            </tr>
                            <tr>
                                <th>Judul Buku</th>
                                <td>{{ $peminjaman->buku->judul }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pinjam</th>
                                <td>{{ $peminjaman->tanggal_pinjam }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Kembali</th>
                                <td>{{ $peminjaman->tanggal_kembali }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer text-center no-print">
                         <button onclick="window.print()" class="btn btn-primary btn-lg">Cetak Kartu</button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger">
            Data peminjaman tidak dapat ditemukan.
        </div>
    @endif
</div>
@endsection
