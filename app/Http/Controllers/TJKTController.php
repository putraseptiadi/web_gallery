<?php

namespace App\Http\Controllers;

use App\Models\KetuaTjkt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TJKTController extends Controller
{
    public function index()
    {
        $KetuaTjkt = KetuaTjkt::all();
        return view('admin.tjkt_admin', compact('KetuaTjkt'));
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

        KetuaTjkt::create($data);
        return redirect()->route('tjkt_admin')->with('success', 'Data berhasil disimpan.');
    }
    // Menampilkan detail Ketua Program
    public function show($id)
    {
        $KetuaTjkt = KetuaTjkt::findOrFail($id);
        return view('admin.tjkt_admin', compact('KetuaTjkt'));
    }

    // Tampilkan halaman edit
    public function edit($id)
    {
        $KetuaTjkt = KetuaTjkt::findOrFail($id);
        return view('jurusan.edit_kaprog_tjkt', compact('KetuaTjkt'));
    }
    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'bidang_keahlian' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $KetuaTjkt = KetuaTjkt::findOrFail($id);
        $data = $request->only('nama', 'bidang_keahlian');

        if ($request->hasFile('foto')) {
            if ($KetuaTjkt->foto) {
                Storage::disk('public')->delete($KetuaTjkt->foto);
            }
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        $KetuaTjkt->update($data);
        return redirect()->route('tjkt_admin')->with('success', 'Data berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        $KetuaTjkt = KetuaTjkt::findOrFail($id);
        if ($KetuaTjkt->foto) {
            Storage::disk('public')->delete($KetuaTjkt->foto);
        }
        $KetuaTjkt->delete();
        return redirect()->route('tjkt_admin')->with('success', 'Data berhasil dihapus.');
    }
}
