<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\KetuaOsis;
use App\Models\InformasiAdmin;
use App\Models\Eskul;
use Illuminate\Http\Request;

class InformasiController extends Controller
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
        return view('jurusan.pplg');
    }
    public function tjkt()
    {
        return view('jurusan.tjkt');
    }
    public function tkro()
    {
        return view('jurusan.tkro');
    }
    public function tflm()
    {
        return view('jurusan.tflm');
    }
    public function informasi()
    {
        // Mengambil data dari tabel InformasiAdmin
        $informasiTerkini = InformasiAdmin::all();

        // Mengirim data ke view 'informasi.informasi'
        return view('informasi.informasi', compact('informasiTerkini'));
    }
    public function agenda()
    {
        $agenda = Agenda::all();
        return view('informasi.agenda', compact('agenda'));
    }
    public function osis()
    {
        $ketuaOsis = KetuaOsis::all();
        return view('informasi.osis', compact('ketuaOsis'));
    }
    public function eskul()
    {
        $eskuls = Eskul::all();
        return view('informasi.eskul', compact('eskuls'));
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
