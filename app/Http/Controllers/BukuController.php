<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Penulis;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('buku.index', compact('bukus'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'stok' => 'required|numeric|min:0'
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $buku = Buku::find($id);
        $penulis = Penulis::all();
        return view('buku.edit', compact('buku', 'penulis'));
    }

    public function update(Request $request, Buku $buku)
{
    $request->validate([
        'judul' => 'required',
        'penulis' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required',
        'stok' => 'required|numeric|min:0'
    ]);

    $buku->update($request->all());

    return redirect()->route('buku.index')
        ->with('success', 'Buku berhasil diperbarui!');
}

    public function destroy($id)
    {
        Buku::destroy($id);
        return redirect('/buku');
    }
}
