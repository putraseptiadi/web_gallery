<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Guru_adminController extends Controller
{
    public function index()
    {
        $gurus = Guru::all(); // Menarik data guru dari database
        return view('admin.guru_admin', compact('gurus')); // Pastikan view ini sesuai dengan nama file view daftar guru
    }

    public function daftar_guruadmin()
    {
        $gurus = Guru::all(); // Mengambil semua data guru
        return view('admin.daftar_guruadmin', compact('gurus')); // Mengirim data ke view
    }

    public function uploadFoto(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan foto guru
        $path = $request->file('foto')->store('uploads', 'public');

        // Simpan data guru ke database
        Guru::create([
            'name' => $request->name,
            'profile_picture' => basename($path),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Foto berhasil diupload!');
    }


    public function guru_karyawan()
    {
        // Ambil data guru dengan pagination (misalnya 20 data per halaman)
        $gurus = Guru::paginate(20);
        return view('profile.guru_karyawan', compact('gurus'));
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);  // Ambil data guru berdasarkan ID
        return view('admin.edit_guru', compact('guru'));  // Kirim variabel guru ke view
    }


    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika ada file foto baru, hapus foto lama dan simpan foto baru
        if ($request->hasFile('foto')) {
            if ($guru->profile_picture && Storage::disk('public')->exists('uploads/' . $guru->profile_picture)) {
                Storage::disk('public')->delete('uploads/' . $guru->profile_picture);
            }
            $path = $request->file('foto')->store('uploads', 'public');
            $guru->profile_picture = basename($path);
        }

        // Perbarui nama guru
        $guru->name = $request->name;
        $guru->save();

        return redirect()->route('admin.daftar_guruadmin')->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        // Hapus foto dari penyimpanan jika ada
        if ($guru->profile_picture && Storage::disk('public')->exists('uploads/' . $guru->profile_picture)) {
            Storage::disk('public')->delete('uploads/' . $guru->profile_picture);
        }

        // Hapus data guru
        $guru->delete();

        return redirect()->route('admin.daftar_guruadmin')->with('success', 'Guru berhasil dihapus.');
    }
}
