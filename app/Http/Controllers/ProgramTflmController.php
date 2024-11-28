<?php

namespace App\Http\Controllers;

use App\Models\PrestasiTflm;
use App\Models\ProfesiTflm;
use Illuminate\Http\Request;

class ProgramTflmController extends Controller
{
    public function index()
    {
        $PrestasiTflm = PrestasiTflm::all();
        $ProfesiTflm = ProfesiTflm::all();
        return view('jurusan_admin.manage_propres_tflm', compact('PrestasiTflm', 'ProfesiTflm'));
    }

    public function storePrestasi(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'tahun' => 'required|digits:4',
        ]);

        PrestasiTflm::create([
            'judul' => $request->judul,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('admin.program_tflm');
    }

    public function storeProfesi(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
        ]);

        ProfesiTflm::create([ // Menggunakan model yang benar
            'judul' => $request->judul,
        ]);

        return redirect()->route('admin.program_tflm');
    }


    public function editPrestasi($id)
    {
        $PrestasiTflm = PrestasiTflm::findOrFail($id);
        return view('jurusan_admin.edit_prestasitflm', compact('PrestasiTflm'));
    }

    public function updatePrestasi(Request $request, $id)
    {
        $PrestasiTflm = PrestasiTflm::findOrFail($id);

        $PrestasiTflm->update([
            'judul' => $request->judul,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('admin.program_tflm');
    }

    public function destroyPrestasi($id)
    {
        PrestasiTflm::destroy($id);
        return redirect()->route('admin.program_tflm');
    }

    public function editProfesi($id)
    {

        $ProfesiTflm = ProfesiTflm::findOrFail($id);
        return view('jurusan_admin.edit_profesitflm', compact('ProfesiTflm'));
    }


    public function updateProfesi(Request $request, $id)
    {
        $ProfesiTflm = ProfesiTflm::findOrFail($id); // Ambil model individu berdasarkan ID

        $ProfesiTflm->update([ // Perbarui datanya
            'judul' => $request->judul,
        ]);

        return redirect()->route('admin.program_tflm'); // Redirect setelah berhasil
    }


    public function destroyProfesi($id)
    {
        ProfesiTflm::destroy($id);
        return redirect()->route('admin.program_tflm');
    }
}
