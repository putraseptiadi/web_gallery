<?php

namespace App\Http\Controllers;

use App\Models\KetuaProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JurusanAdminController extends Controller
{
    // Tampilkan halaman 'pplg_admin'
    public function index()
    {
        $ketuaPrograms = KetuaProgram::all();
        return view('admin.pplg_admin', compact('ketuaPrograms'));
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

        KetuaProgram::create($data);
        return redirect()->route('pplg_admin')->with('success', 'Data berhasil disimpan.');
    }

    // Menampilkan detail Ketua Program
    public function show($id)
    {
        $ketuaProgram = KetuaProgram::findOrFail($id);
        return view('admin.pplg_admin', compact('ketuaProgram'));
    }

    // Tampilkan halaman edit
    public function edit($id)
    {
        $ketuaProgram = KetuaProgram::findOrFail($id);
        return view('jurusan.edit_kaprog_pplg', compact('ketuaProgram'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'bidang_keahlian' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $ketuaProgram = KetuaProgram::findOrFail($id);
        $data = $request->only('nama', 'bidang_keahlian');

        if ($request->hasFile('foto')) {
            if ($ketuaProgram->foto) {
                Storage::disk('public')->delete($ketuaProgram->foto);
            }
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        $ketuaProgram->update($data);
        return redirect()->route('pplg_admin')->with('success', 'Data berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        $ketuaProgram = KetuaProgram::findOrFail($id);
        if ($ketuaProgram->foto) {
            Storage::disk('public')->delete($ketuaProgram->foto);
        }
        $ketuaProgram->delete();
        return redirect()->route('pplg_admin')->with('success', 'Data berhasil dihapus.');
    }
}
