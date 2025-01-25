@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(auth()->user()->role == 'admin')
                <a href="{{ route('penulis.create') }}" class="btn btn-primary btn-sm">Tambah Penulis</a>
                <a href="{{ route('buku.create') }}" class="btn btn-primary btn-sm">Tambah Buku</a>
            @endif
            @if(auth()->user()->role == 'peminjam')
                <a href="{{ route('peminjaman.index') }}" class="btn btn-primary btn-sm">Pinjam Buku</a>
            @endif
            <hr>
            <div class="card">
                <div class="card-header">Data Buku Perpustakaan</div>

                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered datatable">
                        <thead>
                            <tr>
                                <th width="1">ID</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Stok</th>
                                @if(auth()->user()->role == 'admin')
                                <th width="1">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bukus as $buku)
                            <tr>
                                <td>{{ $buku->id }}</td>
                                <td>{{ $buku->judul }}</td>
                                <td>{{ $buku->penulis }}</td>
                                <td>{{ $buku->penerbit }}</td>
                                <td>{{ $buku->tahun_terbit }}</td>
                                <td>{{ $buku->stok }}</td>
                                @if(auth()->user()->role == 'admin')
                                <td>
                                    <div class="gap-2 d-flex">
                                        <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Yakin mau dihapus?')"
                                            type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
    });
</script>
@endpush
@endsection
