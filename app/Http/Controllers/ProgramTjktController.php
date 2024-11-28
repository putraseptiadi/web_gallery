<?php

namespace App\Http\Controllers;

use App\Models\PrestasiTjkt;
use App\Models\ProfesiTjkt;
use Illuminate\Http\Request;

class ProgramTjktController extends Controller
{
    public function index()
    {
        $PrestasiTjkt = PrestasiTjkt::all();
        $ProfesiTjkt = ProfesiTjkt::all();
        return view('jurusan_admin.manage_propres_tjkt', compact('PrestasiTjkt', 'ProfesiTjkt'));
    }

    public function storePrestasi(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'tahun' => 'required|digits:4',
        ]);

        PrestasiTjkt::create([
            'judul' => $request->judul,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('admin.program_tjkt');
    }

    public function storeProfesi(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
        ]);

        ProfesiTjkt::create([
            'judul' => $request->judul,
        ]);

        return redirect()->route('admin.program_tjkt');
    }

    public function editPrestasi($id)
    {
        $PrestasiTjkt = PrestasiTjkt::findOrFail($id);
        return view('jurusan_admin.edit_prestasitjkt', compact('PrestasiTjkt'));
    }

    public function updatePrestasi(Request $request, $id)
    {
        $PrestasiTjkt = PrestasiTjkt::findOrFail($id);

        $PrestasiTjkt->update([
            'judul' => $request->judul,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('admin.program_tjkt');
    }

    public function destroyPrestasi($id)
    {
        PrestasiTjkt::destroy($id);
        return redirect()->route('admin.program_tjkt');
    }

    public function editProfesi($id)
    {

        $ProfesiTjkt = ProfesiTjkt::findOrFail($id);
        return view('jurusan_admin.edit_profesitjkt', compact('ProfesiTjkt'));
    }


    public function updateProfesi(Request $request, $id)
    {
        $ProfesiTjkt = ProfesiTjkt::findOrFail($id); // Ambil model individu berdasarkan ID

        $ProfesiTjkt->update([ // Perbarui datanya
            'judul' => $request->judul,
        ]);

        return redirect()->route('admin.program_tjkt'); // Redirect setelah berhasil
    }


    public function destroyProfesi($id)
    {
        ProfesiTjkt::destroy($id);
        return redirect()->route('admin.program_tjkt');
    }
}
