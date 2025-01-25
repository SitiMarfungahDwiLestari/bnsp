<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agama;
use App\Models\Registrasi;
use PDF;


class RegistrasiController extends Controller
{
    public function index()
    {
        $agama = Agama::all();
        return view('registrasi.index', compact('agama'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'tanggal_lahir' => 'required|date',
            'nomor_telepon' => 'required|numeric',
            'id_agama' => 'required|integer',
            'alamat' => 'required|string',
        ]);

        $registrasi = new Registrasi();
        $registrasi->nama = $request->nama;
        $registrasi->email = $request->email;
        $registrasi->tanggal_lahir = $request->tanggal_lahir;
        $registrasi->nomor_telepon = $request->nomor_telepon;
        $registrasi->id_agama = $request->id_agama;
        $registrasi->alamat = $request->alamat;
        $registrasi->save();

        $id_pendaftaran = $registrasi->id;
        return redirect('/registrasi/cetak/'.$id_pendaftaran)->with('pesan', 'Pendaftaran berhasil');
    }

    public function cetak($id)
    {
        $registrasi = Registrasi::find($id);

        if (request()->has('download')) {
            $pdf = PDF::loadView('registrasi.cetak', ['registrasi'=>$registrasi]);
            return $pdf->download('karturegistrasi.pdf');
        }

        return view('registrasi.cetak', compact('registrasi'));
    }
}
