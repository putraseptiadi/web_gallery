<?php

namespace App\Http\Controllers;

use App\Models\KetuaOsis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KetuaOsisController extends Controller
{
    public function index()
    {
        $ketuaOsis = KetuaOsis::all();
        return view('admin.osis_admin', compact('ketuaOsis'));
    }

    public function daftar_ketua_osis()
    {
        $ketuaOsis = KetuaOsis::all();
        return view('admin2.daftar_ketua_osis', compact('ketuaOsis'));
    }

    public function create()
    {
        return view('admin.osis_admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        KetuaOsis::create($data);

        return redirect()->route('osis_admin')->with('success', 'Data Ketua OSIS berhasil ditambahkan!');
    }

    public function show(KetuaOsis $ketuaOsi)
    {
        return view('admin.osis_admin', compact('ketuaOsi'));
    }

    public function edit(KetuaOsis $ketuaOsi)
    {
        return view('informasi.edit_osis', compact('ketuaOsi'));
    }

    public function update(Request $request, KetuaOsis $ketuaOsi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Delete the old photo if exists
            if ($ketuaOsi->foto) {
                Storage::delete('public/' . $ketuaOsi->foto);
            }

            // Store the new photo
            $data['foto'] = $request->file('foto')->store('images', 'public');
        }

        $ketuaOsi->update($data);

        return redirect()->route('daftar_ketua_osis')->with('success', 'Data Ketua OSIS berhasil diperbarui!');
    }
    public function destroy(KetuaOsis $ketuaOsi)
    {
        // Hapus foto lama jika ada
        if ($ketuaOsi->foto) {
            Storage::delete('public/' . $ketuaOsi->foto);
        }

        // Hapus data Ketua OSIS
        $ketuaOsi->delete();

        return redirect()->route('daftar_ketua_osis')->with('success', 'Data Ketua OSIS berhasil dihapus!');
    }
}
