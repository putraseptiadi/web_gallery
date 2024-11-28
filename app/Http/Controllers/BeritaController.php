<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::all();
        return view('admin.manage_berita', compact('beritas'));
    }
    public function daftar_berita()
    {
        $beritas = Berita::all();
        return view('admin2.daftar_berita', compact('beritas'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'link' => 'nullable|url|max:65535', // 65535 adalah batas maksimum TEXT
        ]);


        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()->route('manage_berita')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(Berita $berita)
    {
        return view('berita_program_perpus.edit_berita', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'link' => 'nullable|url|max:65535', // 65535 adalah batas maksimum TEXT
        ]);


        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($berita->foto) {
                Storage::disk('public')->delete($berita->foto);
            }
            $data['foto'] = $request->file('foto')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('daftar_berita')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id); // Ambil berita berdasarkan ID

        // Hapus foto dari storage jika ada
        if ($berita->foto) {
            Storage::disk('public')->delete($berita->foto);
        }

        // Hapus data berita
        $berita->delete();

        return redirect()->route('daftar_berita')->with('success', 'Berita berhasil dihapus!');
    }
}
