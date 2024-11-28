<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobGuestController extends Controller
{
    // Menampilkan halaman dengan form lamaran pekerjaan
    public function showJobs()
    {
        $jobs = Job::all();
        return view('berita_program_perpus.program', compact('jobs'));
    }

    // Menyimpan lamaran pekerjaan
    public function applyForJob(Request $request)
    {
        // Validasi input form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:job_applications,email',
            'dob' => 'required|date',
            'job_id' => 'required|exists:jobs,id',
        ]);

        // Simpan lamaran pekerjaan
        JobApplication::create($validated);

        return back()->with('success', 'Lamaran berhasil dikirim!');
    }

    // Menampilkan jumlah pelamar per pekerjaan
    public function showJobDashboard($job_id)
    {
        $job = Job::findOrFail($job_id);
        $applicationsCount = $job->applications()->count();

        return view('admin.dashboard', compact('job', 'applicationsCount'));
    }
}
