<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{

    // Read (show all jobs)
    public function index()
    {
        $jobs = Job::all();
        return view('admin.manage_program', compact('jobs'));
    }
    public function daftar_program()
    {
        $jobs = Job::all();
        return view('admin2.daftar_program', compact('jobs'));
    }

    // Create
    public function create()
    {
        return view('admin.manage_program');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'description' => 'required',
            'location' => 'required',
            'deadline' => 'required|date',
        ]);

        Job::create($request->all());

        // Menambahkan notifikasi sukses
        return redirect()->route('manage_program')->with('success', 'Job berhasil ditambahkan!');
    }


    // Update
    public function edit(Job $job)
    {
        return view('berita_program_perpus.edit_program', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required',
            'company' => 'required',
            'description' => 'required',
            'location' => 'required',
            'deadline' => 'required|date',
        ]);

        $job->update($request->all());

        // Menambahkan notifikasi sukses
        return redirect()->route('daftar_program')->with('success', 'Job berhasil diperbarui!');
    }

    public function destroy(Job $job)
    {
        $job->delete();

        // Menambahkan notifikasi sukses
        return redirect()->route('daftar_program')->with('success', 'Job berhasil dihapus!');
    }
}
