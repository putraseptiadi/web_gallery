<?php

namespace App\Http\Controllers;

use App\Models\KetuaTflm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TFLMController extends Controller
{
    public function index()
    {
        $KetuaTflm = KetuaTflm::all();
        return view('admin.tflm_admin', compact('KetuaTflm'));
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

        KetuaTflm::create($data);
        return redirect()->route('tflm_admin')->with('success', 'Data berhasil disimpan.');
    }
    // Menampilkan detail Ketua Program
    public function show($id)
    {
        $KetuaTflm = KetuaTflm::findOrFail($id);
        return view('admin.tflm_admin', compact('KetuaTflm'));
    }

    // Tampilkan halaman edit
    public function edit($id)
    {
        $KetuaTflm = KetuaTflm::findOrFail($id);
        return view('jurusan.edit_kaprog_tflm', compact('KetuaTflm'));
    }
    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'bidang_keahlian' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $KetuaTflm = KetuaTflm::findOrFail($id);
        $data = $request->only('nama', 'bidang_keahlian');

        if ($request->hasFile('foto')) {
            if ($KetuaTflm->foto) {
                Storage::disk('public')->delete($KetuaTflm->foto);
            }
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        $KetuaTflm->update($data);
        return redirect()->route('tflm_admin')->with('success', 'Data berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        $KetuaTflm = KetuaTflm::findOrFail($id);
        if ($KetuaTflm->foto) {
            Storage::disk('public')->delete($KetuaTflm->foto);
        }
        $KetuaTflm->delete();
        return redirect()->route('tflm_admin')->with('success', 'Data berhasil dihapus.');
    }
}
