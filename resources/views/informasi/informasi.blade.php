<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJIKOM</title>
    <link rel="stylesheet" href="{{ asset('css/navbar_footer/navbar_footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile/border.css') }}">
    <link rel="stylesheet" href="{{ asset('css/informasi_home/informasi_terkini_guest.css') }}">
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

    <h2 class="Infor-title">Informasi Terkini</h2>

    <section class="informasi-terkini container my-5">
        <div class="row">
            @foreach ($informasiTerkini as $informasi)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="informasi-item">
                    <h3>{{ $informasi->description }}</h3>
                    <!-- Instagram Embed -->
                    <blockquote class="instagram-media" data-instgrm-permalink="{{ $informasi->instagram_url }}" data-instgrm-version="12">
                        <a href="{{ $informasi->instagram_url }}" target="_blank">Lihat di Instagram</a>
                    </blockquote>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Instagram Embed Script -->
        <script async src="//www.instagram.com/embed.js"></script>
    </section>


    <!-- Bagian Peta dan footer -->
    <footer>
        @include('home.peta_footer')
    </footer>

</body>

</html>