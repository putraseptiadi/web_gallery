<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EskulController extends Controller
{
    public function index()
    {
        $eskuls = Eskul::all();
        return view('admin.eskul_admin', compact('eskuls'));
    }
    public function daftar_eskul()
    {
        $eskuls = Eskul::all();
        return view('admin2.daftar_eskul', compact('eskuls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'schedule' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $logoPath = $request->file('logo')
            ? $request->file('logo')->store('logos', 'public')
            : null;

        Eskul::create([
            'name' => $request->name,
            'description' => $request->description,
            'schedule' => $request->schedule,
            'logo' => $logoPath,
        ]);

        return redirect()->route('eskul_admin')->with('success', 'Ekskul berhasil ditambahkan.');
    }

    public function edit(Eskul $eskul)
    {
        return view('informasi.edit_eskul', compact('eskul'));
    }

    public function update(Request $request, Eskul $eskul)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'schedule' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $logoPath = $eskul->logo;

        if ($request->hasFile('logo')) {
            if ($logoPath) {
                Storage::delete('public/' . $logoPath);
            }
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        $eskul->update([
            'name' => $request->name,
            'description' => $request->description,
            'schedule' => $request->schedule,
            'logo' => $logoPath,
        ]);

        return redirect()->route('daftar_eskul')->with('success', 'Ekskul berhasil diperbarui.');
    }

    public function destroy(Eskul $eskul)
    {
        if ($eskul->logo) {
            Storage::delete('public/' . $eskul->logo);
        }
        $eskul->delete();

        return redirect()->route('daftar_eskul')->with('success', 'Ekskul berhasil dihapus.');
    }
}
