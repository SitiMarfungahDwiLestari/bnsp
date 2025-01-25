<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Penulis;

class BukuController extends Controller
{
    public function index()
    {
        $data = Buku::with('penulis')->get();
        return view('buku.index', compact('data'));
    }

    public function create()
    {
        $penulis = Penulis::all();
        return view('buku.create', compact('penulis'));
    }

    public function store()
    {
        Buku::create(request()->validate([
            'penulis_id' => 'required',
            'judul' => 'required',
            'published_date' => 'required|date'
        ]));
        return redirect('/buku');
    }

    public function edit($id)
    {
        $buku = Buku::find($id);
        $penulis = Penulis::all();
        return view('buku.edit', compact('buku', 'penulis'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);
        $buku->update($request->all());
        return redirect('/buku');
    }

    public function destroy($id)
    {
        Buku::destroy($id);
        return redirect('/buku');
    }
}
