<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJIKOM</title>
    <link rel="stylesheet" href="{{ asset('css/navbar_footer/navbar_footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile/border.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bepropus/berita_guest.css') }}">
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


    <h1 class="berita-title">Berita Terkini</h1>

    <section class="berita-section">
        <div class="container mx-auto px-4 py-8">
            <!-- Grid Berita -->
            <div class="berita-grid">
                @foreach ($beritas as $berita)
                <div class="berita-card">
                    <!-- Gambar Berita -->
                    <img src="{{ $berita->foto_url ?? asset('images/placeholder.jpg') }}" alt="{{ $berita->judul }}">

                    <!-- Judul Berita -->
                    <h2 class="berita-judul">{{ $berita->judul }}</h2>

                    <!-- Konten Berita Singkat -->
                    <p class="berita-content">{{ Str::limit($berita->konten, 120) }}</p>

                    <!-- Link ke Detail Berita -->
                    <div>
                        <a href="{{ $berita->link }}" class="berita-link" target="_blank">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>



    <!-- Bagian Peta dan footer -->
    <footer>
        @include('home.peta_footer')
    </footer>

</body>

</html>