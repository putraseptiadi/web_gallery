<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GaleryAdminController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.galery_admin', compact('galleries'));
    }
    public function daftar_gallery()
    {
        $galleries = Gallery::all();
        return view('admin2.daftar_gallery', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string|max:255',
        ]);

        if ($request->file('photo')) {
            $path = $request->file('photo')->store('uploads', 'public');
            Gallery::create([
                'photo_path' => $path,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('galery_admin')->with('success', 'Foto berhasil diupload!');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.edit_gallery', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $request->validate([
            'description' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Hapus foto lama
            if ($gallery->photo_path && Storage::disk('public')->exists($gallery->photo_path)) {
                Storage::disk('public')->delete($gallery->photo_path);
            }
            // Simpan foto baru
            $path = $request->file('photo')->store('uploads', 'public');
            $gallery->photo_path = $path;
        }

        $gallery->description = $request->description;
        $gallery->save();

        return redirect()->route('admin2.daftar_gallery')->with('success', 'Foto berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Hapus file foto dari penyimpanan
        if ($gallery->photo_path && Storage::disk('public')->exists($gallery->photo_path)) {
            Storage::disk('public')->delete($gallery->photo_path);
        }

        // Hapus data dari database
        $gallery->delete();

        return redirect()->route('admin2.daftar_gallery')->with('success', 'Foto berhasil dihapus!');
    }
}
