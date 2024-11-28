<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Buku;
use App\Models\Eskul;
use App\Models\Gallery;
use App\Models\Guru;
use App\Models\Job;
use App\Models\KetuaOsis;
use App\Models\InformasiAdmin;
use App\Models\KetuaTjkt;
use App\Models\KetuaTkro;
use App\Models\KetuaTflm;
use App\Models\KetuaProgram;
use App\Models\Prestasi;
use App\Models\Profesi;
use App\Models\PrestasiTjkt;
use App\Models\ProfesiTjkt;
use App\Models\PrestasiTkro;
use App\Models\ProfesiTkro;
use App\Models\PrestasiTflm;
use App\Models\ProfesiTflm;



class DashboardController extends Controller
{
    public function index()
    {
        $admins = User::where('role', 'admin')->get();

        $agenda = Agenda::all();

        $beritas = Berita::all();

        $bukus = Buku::all();

        $eskuls = Eskul::all();

        $galleries = Gallery::all();

        $gurus = Guru::all();

        $jobs = Job::all();

        $ketuaOsis = KetuaOsis::all();

        $informasiTerkini = InformasiAdmin::all();

        $ketuaPrograms = KetuaProgram::all();
        $prestasis = Prestasi::all();
        $profesis = Profesi::all();

        $KetuaTjkt = KetuaTjkt::all();
        $PrestasiTjkt = PrestasiTjkt::all();
        $ProfesiTjkt = ProfesiTjkt::all();

        $PrestasiTkro = PrestasiTkro::all();
        $ProfesiTkro = ProfesiTkro::all();
        $KetuaTkro = KetuaTkro::all();

        $KetuaTflm = KetuaTflm::all();
        $PrestasiTflm = PrestasiTflm::all();
        $ProfesiTflm = ProfesiTflm::all();


        return view('admin.dashboard', compact(
            'admins',
            'agenda',
            'beritas',
            'bukus',
            'eskuls',
            'galleries',
            'gurus',
            'jobs',
            'informasiTerkini',
            'ketuaPrograms',
            'ketuaPrograms',
            'prestasis',
            'profesis',
            'KetuaTjkt',
            'PrestasiTjkt',
            'ProfesiTjkt',
            'KetuaTkro',
            'PrestasiTkro',
            'ProfesiTkro',
            'KetuaTflm',
            'PrestasiTflm',
            'ProfesiTflm'

        ));
    }
}
