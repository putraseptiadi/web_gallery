<?php

// app/Http/Controllers/ProgramInfoController.php
namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\Profesi;
use Illuminate\Http\Request;

class ProgramInfoController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::all();
        $profesis = Profesi::all();
        return view('jurusan_admin.manage_propres_pplg', compact('prestasis', 'profesis'));
    }

    public function storePrestasi(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'tahun' => 'required|digits:4',
        ]);

        Prestasi::create([
            'judul' => $request->judul,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('admin.program_info');
    }

    public function storeProfesi(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
        ]);

        Profesi::create([
            'judul' => $request->judul,
        ]);

        return redirect()->route('admin.program_info');
    }

    public function editPrestasi($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('jurusan_admin.edit_prestasi', compact('prestasi'));
    }

    public function updatePrestasi(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $prestasi->update([
            'judul' => $request->judul,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('admin.program_info');
    }

    public function destroyPrestasi($id)
    {
        Prestasi::destroy($id);
        return redirect()->route('admin.program_info');
    }

    public function editProfesi($id)
    {
        $profesi = Profesi::findOrFail($id);
        return view('jurusan_admin.edit_profesi', compact('profesi'));
    }

    public function updateProfesi(Request $request, $id)
    {
        $profesi = Profesi::findOrFail($id);

        $profesi->update([
            'judul' => $request->judul,
        ]);

        return redirect()->route('admin.program_info');
    }

    public function destroyProfesi($id)
    {
        Profesi::destroy($id);
        return redirect()->route('admin.program_info');
    }
}
