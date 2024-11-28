<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiAdmin;

class InformasiAdminController extends Controller
{
    // Menampilkan informasi terkini
    public function index()
    {
        $informasiTerkini = InformasiAdmin::all();
        return view('admin.informasi_admin', compact('informasiTerkini'));
    }

    public function daftar_informasi_terkini()
    {
        $informasiTerkini = InformasiAdmin::all();
        return view('informasi.daftar_informasi_terkini', compact('informasiTerkini'));
    }

    // Menyimpan data Instagram
    public function store(Request $request)
    {
        $request->validate([
            'instagram_url' => 'required|url',
            'description' => 'required|string|max:255',
        ]);

        InformasiAdmin::create([
            'instagram_url' => $request->instagram_url,
            'description' => $request->description,
        ]);

        return redirect()->route('informasi_admin')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $informasi = InformasiAdmin::findOrFail($id);
        return view('informasi.edit_informasi_terkini', compact('informasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'instagram_url' => 'required|url',
            'description' => 'required|string|max:255',
        ]);

        $informasi = InformasiAdmin::findOrFail($id);
        $informasi->update([
            'instagram_url' => $request->instagram_url,
            'description' => $request->description,
        ]);

        return redirect()->route('informasi.daftar_informasi_terkini')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $informasi = InformasiAdmin::findOrFail($id);
        $informasi->delete();


        return redirect()->route('informasi.daftar_informasi_terkini')->with('success', 'Data berhasil dihapus');
    }
}
