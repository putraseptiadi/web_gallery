<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Berita;
use App\Models\Buku;
use App\Models\Job;
use App\Models\Agenda;
use App\Models\CarouselItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $carouselItems = CarouselItem::all();
        $agenda = Agenda::orderBy('created_at', 'desc')->take(3)->get();
        $gurus = Guru::all();
        $beritas = Berita::orderBy('created_at', 'desc')->take(3)->get();  // Mengambil 3 berita terbaru
        return view('home', compact('beritas', 'gurus', 'agenda', 'carouselItems'));
    }



    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function profile_admin()
    {
        return view('admin.profile_admin');
    }
    public function daftar_guruadmin()
    {
        // Ambil data guru yang perlu ditampilkan
        $gurus = Guru::all();  // Atau query sesuai kebutuhanmu
        return view('admin.daftar_guruadmin', compact('gurus'));
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
        $beritas = Berita::all();
        return view('berita_program_perpus.berita', compact('beritas'));
    }


    public function perpustakaan()
    {
        $bukus = Buku::all();
        return view('berita_program_perpus.perpustakaan', compact('bukus'));
    }
    public function program()
    {
        $jobs = Job::all();
        return view('berita_program_perpus.program', compact('jobs'));
    }
}
