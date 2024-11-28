<?php

namespace App\Http\Controllers;

use App\Models\PrestasiTkro;
use App\Models\ProfesiTkro;
use Illuminate\Http\Request;

class ProgramTkroController extends Controller
{
    public function index()
    {
        $PrestasiTkro = PrestasiTkro::all();
        $ProfesiTkro = ProfesiTkro::all();
        return view('jurusan_admin.manage_propres_tkro', compact('PrestasiTkro', 'ProfesiTkro'));
    }

    public function storePrestasi(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'tahun' => 'required|digits:4',
        ]);

        PrestasiTkro::create([
            'judul' => $request->judul,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('admin.program_tkro');
    }

    public function storeProfesi(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
        ]);

        ProfesiTkro::create([ // Menggunakan model yang benar
            'judul' => $request->judul,
        ]);

        return redirect()->route('admin.program_tkro');
    }


    public function editPrestasi($id)
    {
        $PrestasiTkro = PrestasiTkro::findOrFail($id);
        return view('jurusan_admin.edit_prestasitkro', compact('PrestasiTkro'));
    }

    public function updatePrestasi(Request $request, $id)
    {
        $PrestasiTkro = PrestasiTkro::findOrFail($id);

        $PrestasiTkro->update([
            'judul' => $request->judul,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('admin.program_tkro');
    }

    public function destroyPrestasi($id)
    {
        PrestasiTkro::destroy($id);
        return redirect()->route('admin.program_tkro');
    }

    public function editProfesi($id)
    {

        $ProfesiTkro = ProfesiTkro::findOrFail($id);
        return view('jurusan_admin.edit_profesitkro', compact('ProfesiTkro'));
    }


    public function updateProfesi(Request $request, $id)
    {
        $ProfesiTkro = ProfesiTkro::findOrFail($id); // Ambil model individu berdasarkan ID

        $ProfesiTkro->update([ // Perbarui datanya
            'judul' => $request->judul,
        ]);

        return redirect()->route('admin.program_tkro'); // Redirect setelah berhasil
    }


    public function destroyProfesi($id)
    {
        ProfesiTkro::destroy($id);
        return redirect()->route('admin.program_tkro');
    }
}
