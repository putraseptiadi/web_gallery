<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('admin.manage_perpus', compact('bukus'));
    }
    public function daftar_perpus()
    {
        $bukus = Buku::all();
        return view('admin2.daftar_perpus', compact('bukus'));
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
            'tahun_terbit' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:tersedia,tidak tersedia',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('images', 'public');
        }

        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'foto' => $foto,
            'status' => $request->status,
        ]);

        return redirect()->route('manage_perpus')->with('success', 'Job berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('berita_program_perpus.edit_buku', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:tersedia,tidak tersedia',
        ]);

        $buku = Buku::findOrFail($id);
        $foto = $buku->foto;

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($foto) {
                Storage::delete($foto);
            }

            $foto = $request->file('foto')->store('images');
        }

        $buku->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'foto' => $foto,
            'status' => $request->status,
        ]);

        return redirect()->route('daftar_perpus')->with('success', 'Job berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        // Hapus foto jika ada
        if ($buku->foto) {
            Storage::delete($buku->foto);
        }

        $buku->delete();

        return redirect()->route('daftar_perpus')->with('success', 'Job berhasil dihapus!');
    }
}
