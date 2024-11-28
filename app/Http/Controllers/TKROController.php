<?php

namespace App\Http\Controllers;

use App\Models\KetuaTkro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TKROController extends Controller
{
    public function index()
    {
        $KetuaTkro = KetuaTkro::all();
        return view('admin.tkro_admin', compact('KetuaTkro'));
    }


    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'bidang_keahlian' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('nama', 'bidang_keahlian');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        KetuaTkro::create($data);
        return redirect()->route('tkro_admin')->with('success', 'Data berhasil disimpan.');
    }
    public function show($id)
    {
        // Temukan KetuaTkro berdasarkan ID
        $KetuaTkro = KetuaTkro::findOrFail($id);  // Ini akan mengambil satu data berdasarkan ID
        return view('admin.tkro_admin', compact('KetuaTkro'));  // Variabel diteruskan ke tampilan
    }


    public function edit($id)
    {
        $KetuaTkro = KetuaTkro::findOrFail($id);
        return view('jurusan.edit_kaprog_tkro', compact('KetuaTkro'));  // Pastikan variabel diteruskan untuk tampilan edit
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'bidang_keahlian' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $KetuaTkro = KetuaTkro::findOrFail($id);
        $data = $request->only('nama', 'bidang_keahlian');

        if ($request->hasFile('foto')) {
            if ($KetuaTkro->foto) {
                Storage::disk('public')->delete($KetuaTkro->foto);
            }
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        $KetuaTkro->update($data);
        return redirect()->route('tkro_admin')->with('success', 'Data berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        $KetuaTkro = KetuaTkro::findOrFail($id);
        if ($KetuaTkro->foto) {
            Storage::disk('public')->delete($KetuaTkro->foto);
        }
        $KetuaTkro->delete();
        return redirect()->route('tkro_admin')->with('success', 'Data berhasil dihapus.');
    }
}
