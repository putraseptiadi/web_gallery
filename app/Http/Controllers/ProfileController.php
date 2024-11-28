<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class ProfileController extends Controller
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
        // Mengambil semua data galeri
        $galleries = Gallery::all();

        // Mengirim data ke view
        return view('profile.galeri', compact('galleries'));
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
