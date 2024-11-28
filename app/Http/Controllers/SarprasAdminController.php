<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Sarpras;

class SarprasAdminController extends Controller
{
    public function index()
    {
        $sarprasItems = Sarpras::all();
        return view('admin.sarpras_admin', compact('sarprasItems'));
    }
    public function daftar_sarpras()
    {
        $sarprasItems = Sarpras::all(); // Mengambil semua data guru
        return view('admin2.daftar_sarpras', compact('sarprasItems')); // Mengirim data ke view
    }
    public function sarana()
    {
        $sarprasItems = Sarpras::paginate(25);
        return view('profile.sarana', compact('sarprasItems'));
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan foto ke dalam folder "uploads" pada disk "public"
        $path = $request->file('photo')->store('sarpras', 'public');

        // Simpan data ke database
        Sarpras::create([
            'name' => $request->name,
            'description' => $request->description,
            'photo_path' => basename($path), // Hanya simpan nama file
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Foto berhasil diunggah');
    }
    public function edit($id)
    {
        $sarpras = Sarpras::findOrFail($id); // Temukan data sarpras berdasarkan ID
        return view('sarpras_edit', compact('sarpras')); // Kirim data sarpras ke view
    }


    public function update(Request $request, $id)
    {
        $sarpras = Sarpras::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Jika ada file baru
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('sarpras', 'public');
            $sarpras->photo_path = basename($path);
        }

        $sarpras->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin2.daftar_sarpras')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $sarpras = Sarpras::findOrFail($id);

        // Hapus file foto dari storage
        Storage::delete('public/sarpras/' . $sarpras->photo_path);

        $sarpras->delete();

        return redirect()->route('admin2.daftar_sarpras')->with('success', 'Data berhasil dihapus');
    }
}
