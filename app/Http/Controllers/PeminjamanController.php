<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class PeminjamanController extends Controller
{
    public function index()
    {
        // Jika admin, tampilkan semua data
        if(auth()->user()->role == 'admin') {
            $peminjaman = Peminjaman::with(['user', 'buku'])->get();
        } else {
            // Jika peminjam, tampilkan data miliknya saja
            $peminjaman = Peminjaman::with(['user', 'buku'])
                ->where('user_id', auth()->id())
                ->get();
        }
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $bukus = Buku::where('stok', '>', 0)->get();
        return view('peminjaman.create', compact('bukus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam'
        ]);

        $buku = Buku::findOrFail($request->buku_id);

        if($buku->stok < 1) {
            return back()->with('error', 'Stok buku tidak tersedia');
        }

        Peminjaman::create([
            'user_id' => auth()->id(),
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'dipinjam'
        ]);

        $buku->decrement('stok');

        return redirect()->route('peminjaman.index')
            ->with('success', 'Buku berhasil dipinjam');
    }

    public function kembalikan($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // Update status peminjaman
        $peminjaman->update([
            'status' => 'dikembalikan'
        ]);

        // Increment stok buku
        $peminjaman->buku->increment('stok');

        return back()->with('success', 'Buku berhasil dikembalikan');
    }

    public function cetak($id)
    {
        $peminjaman = Peminjaman::with(['user', 'buku'])->findOrFail($id);

    if(request()->has('download')) {
        $pdf = PDF::loadView('peminjaman.pdf', compact('peminjaman'));
        return $pdf->download('bukti-peminjaman-' . $peminjaman->id . '.pdf');
    }

    return view('peminjaman.cetak', compact('peminjaman'));
    }

    public function edit($id)
{
    $peminjaman = Peminjaman::findOrFail($id);

    // Cek apakah peminjaman milik user yang login
    if($peminjaman->user_id != auth()->id()) {
        return back()->with('error', 'Anda tidak memiliki akses');
    }

    // Cek apakah status masih dipinjam
    if($peminjaman->status != 'dipinjam') {
        return back()->with('error', 'Tidak dapat mengedit peminjaman yang sudah dikembalikan');
    }

    return view('peminjaman.edit', compact('peminjaman'));
}

public function update(Request $request, $id)
{
    $peminjaman = Peminjaman::findOrFail($id);

    // Validasi akses
    if($peminjaman->user_id != auth()->id()) {
        return back()->with('error', 'Anda tidak memiliki akses');
    }

    // Validasi status
    if($peminjaman->status != 'dipinjam') {
        return back()->with('error', 'Tidak dapat mengedit peminjaman yang sudah dikembalikan');
    }

    $request->validate([
        'tanggal_pinjam' => 'required|date',
        'tanggal_kembali' => 'required|date|after:tanggal_pinjam'
    ]);

    $peminjaman->update([
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'tanggal_kembali' => $request->tanggal_kembali
    ]);

    return redirect()->route('peminjaman.index')
        ->with('success', 'Data peminjaman berhasil diupdate');
}
}
