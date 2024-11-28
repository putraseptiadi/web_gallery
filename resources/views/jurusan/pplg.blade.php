<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJIKOM</title>
    <link rel="stylesheet" href="{{ asset('css/jurusan/pplg.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar_footer/navbar_footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile/border.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</head>

<body>




    <!-- Header -->
    <header>
        @include('navbar.header_index')
    </header>

    <!-- Visi dan Misi Section -->
    <section class="text-center mb-4 section-title">
        <h1>SMK NEGERI 4 BOGOR</h1>
    </section>

    <section class="program-info container my-5">
        <div class="row">
            <!-- Logo Sekolah -->
            <div class="col-md-4 text-center d-flex flex-column align-items-center">
                <img src="{{ asset('path/images/PPLG.png') }}" alt="Logo SMK NEGERI 4 BOGOR" class="img-fluid mb-4" style="max-width: 100%; height: auto;">
            </div>

            <!-- Deskripsi Jurusan dan Ketua Program Keahlian -->
            <div class="col-md-8">
                <!-- Deskripsi Jurusan -->
                <h2>Pengembangan Perangkat Lunak & Gim</h2>
                <p>Kompetensi keahlian PPLG di SMK Negeri 4 Bogor mencakup pembelajaran Pemrograman, Desain Aplikasi, dan Pengembangan Gim. Kompetensi ini bertujuan agar siswa mampu menguasai teknologi informasi untuk menciptakan solusi inovatif di berbagai bidang.</p>
                <p>Siswa kompetensi keahlian PPLG diharapkan dapat mengembangkan perangkat lunak yang berkualitas, merancang antarmuka pengguna (UI/UX) yang menarik, dan menciptakan gim interaktif yang menghibur sekaligus mendidik.</p>

                <hr class="my-4">

                <!-- Ketua Program Keahlian -->
                <div class="row align-items-center">
                    @foreach($ketuaPrograms as $ketuaProgram)
                    <div class="col-md-3 text-center">
                        <img src="{{ asset('storage/' . ($ketuaProgram->foto ?? 'path/images/pp_kosong.jpg')) }}"
                            alt="Ketua Program" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                    </div>
                    <div class="col-md-9">
                        <h3>Ketua Program Keahlian</h3>
                        <p><strong>Nama:</strong> {{ $ketuaProgram->nama }}<br>
                            <strong>Bidang Keahlian:</strong> {{ $ketuaProgram->bidang_keahlian }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </section>

    <section class="program-info container my-5">
        <div class="row">
            <!-- Bagian Prestasi -->
            <div class="col-md-6">
                <h3><i class="bi bi-trophy"></i> Prestasi</h3>
                <ul>
                    @foreach($prestasis as $index => $prestasi)
                    <li>
                        {{ $prestasi->judul }} ({{ $prestasi->tahun }})
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Bagian Profesi / Bidang Kerja -->
            <div class="col-md-6">
                <h3><i class="bi bi-building"></i> Profesi / Bidang Kerja</h3>
                <ul>
                    @foreach($profesis as $index => $profesi)
                    <li>
                        {{ $profesi->judul }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>



    <!-- Bagian Peta dan footer -->
    <footer>
        @include('home.peta_footer')
    </footer>

</body>

</html>