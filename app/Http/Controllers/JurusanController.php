<?php

namespace App\Http\Controllers;

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
use Illuminate\Http\Request;


class JurusanController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function slideshow()
    {
        return view('home.slideshow');
    }

    public function profileBerita()
    {
        return view('home.profile_berita');
    }

    public function prakata()
    {
        return view('home.prakata');
    }

    public function petaFooter()
    {
        return view('home.peta_footer');
    }

    public function guru()
    {
        return view('home.guru');
    }

    public function agendaInfor()
    {
        return view('home.agenda_infor');
    }
    public function visi()
    {
        return view('profile.visi');
    }
    public function struktur()
    {
        return view('profile.struktur');
    }
    public function guru_karyawan()
    {
        return view('profile.guru_karyawan');
    }
    public function sarana()
    {
        return view('profile.sarana');
    }
    public function galeri()
    {
        return view('profile.galeri');
    }
    public function pplg()
    {
        $ketuaPrograms = KetuaProgram::all();
        $prestasis = Prestasi::all();
        $profesis = Profesi::all();

        // Pastikan nama view sesuai kebutuhan
        return view('jurusan.pplg', compact('ketuaPrograms', 'prestasis', 'profesis'));
    }

    public function tjkt()
    {
        $KetuaTjkt = KetuaTjkt::all();
        $PrestasiTjkt = PrestasiTjkt::all();
        $ProfesiTjkt = ProfesiTjkt::all();
        return view('jurusan.tjkt', compact('KetuaTjkt', 'PrestasiTjkt', 'ProfesiTjkt'));
    }
    public function tkro()
    {
        $PrestasiTkro = PrestasiTkro::all();
        $ProfesiTkro = ProfesiTkro::all();
        $KetuaTkro = KetuaTkro::all();
        return view('jurusan.tkro', compact('KetuaTkro', 'PrestasiTkro', 'ProfesiTkro'));
    }
    public function tflm()
    {
        $KetuaTflm = KetuaTflm::all();
        $PrestasiTflm = PrestasiTflm::all();
        $ProfesiTflm = ProfesiTflm::all();
        return view('jurusan.tflm', compact('KetuaTflm', 'PrestasiTflm', 'ProfesiTflm'));
    }
    public function informasi()
    {
        return view('informasi.informasi');
    }
    public function agenda()
    {
        return view('informasi.agenda');
    }
    public function osis()
    {
        return view('informasi.osis');
    }
    public function eskul()
    {
        return view('informasi.eskul');
    }
    public function berita()
    {
        return view('berita');
    }
    public function perpustakaan()
    {
        return view('perpustakaan');
    }
    public function program()
    {
        return view('program');
    }
}
