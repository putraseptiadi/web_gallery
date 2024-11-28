<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Profile_adminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Guru_adminController;
use App\Http\Controllers\SarprasAdminController;
use App\Http\Controllers\GaleryAdminController;
use App\Http\Controllers\InformasiAdminController;
use App\Http\Controllers\AgendaAdminController;
use App\Http\Controllers\JurusanAdminController;
use App\Http\Controllers\TJKTController;
use App\Http\Controllers\TKROController;
use App\Http\Controllers\TFLMController;
use App\Http\Controllers\ProgramInfoController;
use App\Http\Controllers\ProgramTjktController;
use App\Http\Controllers\ProgramTkroController;
use App\Http\Controllers\ProgramTflmController;
use App\Http\Controllers\KetuaOsisController;
use App\Http\Controllers\EskulController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CarouselController;

Route::resource('/admin/carousel', CarouselController::class);
Route::get('/admin/manage_home', [CarouselController::class, 'manage_home'])->name('manage_home');
Route::get('/admin/daftar_slideshow', [CarouselController::class, 'daftar_slideshow'])->name('daftar_slideshow');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('admin/jobs/create', [JobController::class, 'create'])->name('create_job'); // Create job form
Route::post('admin/jobs', [JobController::class, 'store'])->name('store_job'); // Store new job
Route::get('admin/jobs/{job}/edit', [JobController::class, 'edit'])->name('edit_job'); // Edit job form
Route::put('admin/jobs/{job}', [JobController::class, 'update'])->name('update_job'); // Update job
Route::delete('admin/jobs/{job}', [JobController::class, 'destroy'])->name('delete_job'); // Delete job
Route::get('/admin/manage_program', [JobController::class, 'index'])->name('manage_program');
Route::get('/admin/daftar_program', [JobController::class, 'daftar_program'])->name('daftar_program');

Route::get('admin/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('admin/buku', [BukuController::class, 'store'])->name('buku.store');
Route::get('admin/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('admin/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::delete('admin/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('/admin/manage_perpus', [BukuController::class, 'index'])->name('manage_perpus');
Route::get('/admin/daftar_perpus', [BukuController::class, 'daftar_perpus'])->name('daftar_perpus');

// Index (Menampilkan semua berita)
Route::get('/admin/daftar_berita', [BeritaController::class, 'daftar_berita'])->name('daftar_berita');
Route::get('/admin/manage_berita', [BeritaController::class, 'index'])->name('manage_berita');
Route::get('/admin/manage_berita/create', [BeritaController::class, 'create'])->name('berita.create');
Route::post('/admin/manage_berita', [BeritaController::class, 'store'])->name('berita.store');
Route::get('/admin/manage_berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
Route::put('/admin/manage_berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
Route::delete('/admin/manage_berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');

Route::get('/admin/daftar_eskul', [EskulController::class, 'daftar_eskul'])->name('daftar_eskul');
Route::get('/admin/eskul_admin', [EskulController::class, 'index'])->name('eskul_admin');
Route::post('/admin/eskul_admin', [EskulController::class, 'store'])->name('eskul_admin.store');
Route::get('/admin/eskul_admin/{eskul}/edit', [EskulController::class, 'edit'])->name('eskul_admin.edit');
Route::put('/admin/eskul_admin/{eskul}', [EskulController::class, 'update'])->name('eskul_admin.update');
Route::delete('/admin/eskul_admin/{eskul}', [EskulController::class, 'destroy'])->name('eskul_admin.destroy');


// Resource route untuk pengelolaan Ketua OSIS
Route::get('admin/daftar_ketua_osis', [KetuaOsisController::class, 'daftar_ketua_osis'])->name('daftar_ketua_osis');
Route::delete('ketua_osis/{ketuaOsi}', [KetuaOsisController::class, 'destroy'])->name('ketua_osis.destroy');
Route::post('admin/ketua_osis', [KetuaOsisController::class, 'store'])->name('ketua_osis.store');
Route::get('admin/ketua_osis/{ketuaOsi}', [KetuaOsisController::class, 'show'])->name('ketua_osis.show');
Route::get('admin/ketua_osis/{ketuaOsi}/edit', [KetuaOsisController::class, 'edit'])->name('ketua_osis.edit');
Route::put('admin/ketua_osis/{ketuaOsi}', [KetuaOsisController::class, 'update'])->name('ketua_osis.update');
Route::get('/admin/osis_admin', [KetuaOsisController::class, 'index'])->name('osis_admin');


Route::get('/admin/program-tflm', [ProgramTflmController::class, 'index'])->name('admin.program_tflm');
Route::get('/admin/manage_propres_tflm', [ProgramTflmController::class, 'index'])->name('jurusan_admin.manage_propres_tflm');

// Route untuk Prestasi Tflm
Route::get('/admin/prestasitflm/{id}/edit', [ProgramTflmController::class, 'editPrestasi'])->name('prestasitflm.edit');
Route::post('/admin/prestasitflm', [ProgramTflmController::class, 'storePrestasi'])->name('prestasitflm.store');
Route::put('/admin/prestasitflm/{id}', [ProgramTflmController::class, 'updatePrestasi'])->name('prestasitflm.update');
Route::delete('/admin/prestasitflm/{id}', [ProgramTflmController::class, 'destroyPrestasi'])->name('prestasitflm.destroy');

// Route untuk Profesi Tflm
Route::get('/admin/profesitflm/{id}/edit', [ProgramTflmController::class, 'editProfesi'])->name('profesitflm.edit');
Route::post('/admin/profesitflm', [ProgramTflmController::class, 'storeProfesi'])->name('profesitflm.store');
Route::put('/admin/profesitflm/{id}', [ProgramTflmController::class, 'updateProfesi'])->name('profesitflm.update');
Route::delete('/admin/profesitflm/{id}', [ProgramTflmController::class, 'destroyProfesi'])->name('profesitflm.destroy');


Route::get('/admin/program-tkro', [ProgramTkroController::class, 'index'])->name('admin.program_tkro');
Route::get('/admin/manage_propres_tkro', [ProgramTkroController::class, 'index'])->name('jurusan_admin.manage_propres_tkro');

// Route untuk Prestasi Tkro
Route::get('/admin/prestasitkro/{id}/edit', [ProgramTkroController::class, 'editPrestasi'])->name('prestasitkro.edit');
Route::post('/admin/prestasitkro', [ProgramTkroController::class, 'storePrestasi'])->name('prestasitkro.store');
Route::put('/admin/prestasitkro/{id}', [ProgramTkroController::class, 'updatePrestasi'])->name('prestasitkro.update');
Route::delete('/admin/prestasitkro/{id}', [ProgramTkroController::class, 'destroyPrestasi'])->name('prestasitkro.destroy');

// Route untuk Profesi Tkro
Route::get('/admin/profesitkro/{id}/edit', [ProgramTkroController::class, 'editProfesi'])->name('profesitkro.edit');
Route::post('/admin/profesitkro', [ProgramTkroController::class, 'storeProfesi'])->name('profesitkro.store');
Route::put('/admin/profesitkro/{id}', [ProgramTkroController::class, 'updateProfesi'])->name('profesitkro.update');
Route::delete('/admin/profesitkro/{id}', [ProgramTkroController::class, 'destroyProfesi'])->name('profesitkro.destroy');




Route::get('/admin/program-tjkt', [ProgramTjktController::class, 'index'])->name('admin.program_tjkt');
Route::get('/admin/manage_propres_tjkt', [ProgramTjktController::class, 'index'])->name('jurusan_admin.manage_propres_tjkt');
// Route untuk Prestasi Tjkt
Route::get('/admin/prestasitjkt/{id}/edit', [ProgramTjktController::class, 'editPrestasi'])->name('prestasitjkt.edit');
Route::post('/admin/prestasitjkt', [ProgramTjktController::class, 'storePrestasi'])->name('prestasitjkt.store');
Route::put('/admin/prestasitjkt/{id}', [ProgramTjktController::class, 'updatePrestasi'])->name('prestasitjkt.update');
Route::delete('/admin/prestasitjkt/{id}', [ProgramTjktController::class, 'destroyPrestasi'])->name('prestasitjkt.destroy');

// Route untuk Profesi Tjkt
Route::get('/admin/profesitjkt/{id}/edit', [ProgramTjktController::class, 'editProfesi'])->name('profesitjkt.edit');
Route::post('/admin/profesitjkt', [ProgramTjktController::class, 'storeProfesi'])->name('profesitjkt.store');
Route::put('/admin/profesitjkt/{id}', [ProgramTjktController::class, 'updateProfesi'])->name('profesitjkt.update');
Route::delete('/admin/profesitjkt/{id}', [ProgramTjktController::class, 'destroyProfesi'])->name('profesitjkt.destroy');



Route::get('/admin/program-info', [ProgramInfoController::class, 'index'])->name('admin.program_info');
Route::get('/admin/manage_propres_pplg', [ProgramInfoController::class, 'index'])->name('jurusan_admin.manage_propres_pplg');
// Route untuk Prestasi pplg
Route::get('/admin/prestasi/{id}/edit', [ProgramInfoController::class, 'editPrestasi'])->name('prestasi.edit');
Route::post('/admin/prestasi', [ProgramInfoController::class, 'storePrestasi'])->name('prestasi.store');
Route::put('/admin/prestasi/{id}', [ProgramInfoController::class, 'updatePrestasi'])->name('prestasi.update');
Route::delete('/admin/prestasi/{id}', [ProgramInfoController::class, 'destroyPrestasi'])->name('prestasi.destroy');
// Route untuk Profesi pplg
Route::get('/admin/profesi/{id}/edit', [ProgramInfoController::class, 'editProfesi'])->name('profesi.edit');
Route::post('/admin/profesi', [ProgramInfoController::class, 'storeProfesi'])->name('profesi.store');
Route::put('/admin/profesi/{id}', [ProgramInfoController::class, 'updateProfesi'])->name('profesi.update');
Route::delete('/admin/profesi/{id}', [ProgramInfoController::class, 'destroyProfesi'])->name('profesi.destroy');


Route::resource('tflm_program', TFLMController::class)->except(['create']);
Route::get('/admin/tflm_admin', [TFLMController::class, 'index'])->name('tflm_admin');


Route::resource('tkro_program', TKROController::class)->except(['create']);
Route::get('/admin/tkro_admin', [TKROController::class, 'index'])->name('tkro_admin');


Route::resource('tjkt_program', TJKTController::class)->except(['create']);
Route::get('/admin/tjkt_admin', [TJKTController::class, 'index'])->name('tjkt_admin');

// Route resource untuk 'ketua_program'
Route::resource('ketua_program', JurusanAdminController::class)->except(['create']);
Route::get('/admin/pplg_admin', [JurusanAdminController::class, 'index'])->name('pplg_admin');


Route::get('/admin/sarpras_admin', [SarprasAdminController::class, 'index'])->name('sarpras_admin');
Route::get('/admin/sarpras/edit/{id}', [SarprasAdminController::class, 'edit'])->name('sarpras.edit');
Route::post('/admin/sarpras/update/{id}', [SarprasAdminController::class, 'update'])->name('sarpras.update');
Route::delete('/admin/sarpras/delete/{id}', [SarprasAdminController::class, 'destroy'])->name('sarpras.delete');
Route::post('/admin/sarpras/store', [SarprasAdminController::class, 'store'])->name('sarpras.store');
Route::get('/admin/daftar_sarpras', [SarprasAdminController::class, 'daftar_sarpras'])->name('admin2.daftar_sarpras');

Route::get('/admin/daftar_informasi_terkini', [InformasiAdminController::class, 'daftar_informasi_terkini'])->name('informasi.daftar_informasi_terkini');
Route::get('/admin/informasi_admin', [InformasiAdminController::class, 'index'])->name('informasi_admin');
Route::post('/admin/informasi_admin', [InformasiAdminController::class, 'store'])->name('informasi_store');
Route::get('/admin/informasi_admin/{id}/edit', [InformasiAdminController::class, 'edit'])->name('informasi_admin.edit');
Route::put('/admin/informasi_admin/{id}', [InformasiAdminController::class, 'update'])->name('informasi_admin.update');
Route::delete('/admin/informasi_admin/{id}', [InformasiAdminController::class, 'destroy'])->name('informasi_admin.destroy');

Route::get('/admin/daftar_agenda', [AgendaAdminController::class, 'daftar_agenda'])->name('admin2.daftar_agenda');
Route::get('/admin/agenda_admin', [AgendaAdminController::class, 'index'])->name('agenda_admin');
Route::post('/admin/agenda_admin', [AgendaAdminController::class, 'store'])->name('agenda_admin.store');
Route::get('/admin/agenda_admin/{id}/edit', [AgendaAdminController::class, 'edit'])->name('agenda_admin.edit');
Route::put('/admin/agenda_admin/{id}', [AgendaAdminController::class, 'update'])->name('agenda_admin.update');

Route::delete('/admin/agenda_admin/{id}', [AgendaAdminController::class, 'destroy'])->name('agenda_admin.destroy');

Route::get('/admin/galery_admin', [GaleryAdminController::class, 'index'])->name('galery_admin');
Route::post('/admin/galery_admin', [GaleryAdminController::class, 'store'])->name('galery_admin.store');
Route::get('/admin/galery_admin/{id}/edit', [GaleryAdminController::class, 'edit'])->name('galery_admin.edit');
Route::put('/admin/galery_admin/{id}', [GaleryAdminController::class, 'update'])->name('galery_admin.update');
Route::delete('/admin/galery_admin/{id}', [GaleryAdminController::class, 'destroy'])->name('galery_admin.destroy');
Route::get('/admin/daftar_gallery', [GaleryAdminController::class, 'daftar_gallery'])->name('admin2.daftar_gallery');



Route::get('/admin/{id}/edit', [Guru_adminController::class, 'edit'])->name('admin.edit_guru');
Route::delete('/admin/{id}/', [Guru_adminController::class, 'destroy'])->name('admin.destroy');
// Route untuk update guru
Route::put('guru/{id}', [Guru_adminController::class, 'update'])->name('guru.update');


Route::get('/admin/guru_admin', [Guru_adminController::class, 'index'])->name('guru_admin');

Route::post('/upload-foto', [Guru_adminController::class, 'uploadFoto'])->name('upload_foto');

Route::get('/admin/manage', [AdminController::class, 'index'])->name('manage_admin');
Route::post('/admin/manage', [AdminController::class, 'store'])->name('store_admin');

Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('edit_admin');
Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('update_admin');
Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('delete_admin');

Route::post('/profile_admin/upload', [Profile_adminController::class, 'uploadProfilePicture'])->name('profile.upload');


Route::view('/login', 'login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/admin/profile_admin', [HomeController::class, 'profile_admin'])->name('profile_admin');
Route::get('/admin/daftar_guruadmin', [Guru_adminController::class, 'daftar_guruadmin'])->name('admin.daftar_guruadmin');

// Rute untuk Halaman Utama
Route::get('/', [HomeController::class, 'index']);
Route::get('/home/slideshow', [HomeController::class, 'slideshow']);
Route::get('/home/profile', [HomeController::class, 'profileBerita']);
Route::get('/home/prakata', [HomeController::class, 'prakata']);
Route::get('/home/peta-footer', [HomeController::class, 'petaFooter']);
Route::get('/home/guru', [HomeController::class, 'guru']);
Route::get('/home/agenda', [HomeController::class, 'agendaInfor']);
Route::get('/berita', [HomeController::class, 'berita']);
Route::get('/perpustakaan', [HomeController::class, 'perpustakaan']);
Route::get('/program', [HomeController::class, 'program']);
Route::get('/program', [HomeController::class, 'program']);

// Rute untuk Profile
Route::get('/profile/visi', [ProfileController::class, 'visi']);
Route::get('/profile/struktur', [ProfileController::class, 'struktur']);
Route::get('/profile/guru_karyawan', [Guru_adminController::class, 'guru_karyawan']);
Route::get('/profile/sarana', [SarprasAdminController::class, 'sarana']);
Route::get('/profile/galeri', [ProfileController::class, 'galeri']);

// Rute untuk Jurusan
Route::get('/jurusan/pplg', [JurusanController::class, 'pplg']);
Route::get('/jurusan/tjkt', [JurusanController::class, 'tjkt']);
Route::get('/jurusan/tkro', [JurusanController::class, 'tkro']);
Route::get('/jurusan/tflm', [JurusanController::class, 'tflm']);

// Rute untuk Informasi
Route::get('/informasi/informasi', [InformasiController::class, 'informasi']);
Route::get('/informasi/agenda', [InformasiController::class, 'agenda']);
Route::get('/informasi/osis', [InformasiController::class, 'osis']);
Route::get('/informasi/eskul', [InformasiController::class, 'eskul']);
