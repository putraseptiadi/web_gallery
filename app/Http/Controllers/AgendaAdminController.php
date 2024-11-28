<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaAdminController extends Controller
{
    public function index()
    {
        $agenda = Agenda::all();
        return view('admin.agenda_admin', compact('agenda'));
    }
    public function daftar_agenda()
    {
        $agenda = Agenda::all();
        return view('admin2.daftar_agenda', compact('agenda'));
    }

    public function store(Request $request)
    {
        // Validasi data agenda
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        // Simpan data agenda ke database tanpa file
        Agenda::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
        ]);

        return redirect()->route('agenda_admin')->with('success', 'Agenda berhasil disimpan');
    }

    // Menampilkan form untuk mengedit agenda
    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('edit_agenda', compact('agenda'));
    }

    // Mengupdate data agenda
    public function update(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);

        // Validasi data agenda
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        // Update data agenda
        $agenda->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
        ]);

        return redirect()->route('admin2.daftar_agenda')->with('success', 'Agenda berhasil diperbarui');
    }

    // Menghapus agenda
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        return redirect()->route('admin2.daftar_agenda')->with('success', 'Agenda berhasil dihapus');
    }
}
