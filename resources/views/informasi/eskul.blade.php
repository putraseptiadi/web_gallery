<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJIKOM</title>
    <link rel="stylesheet" href="{{ asset('css/navbar_footer/navbar_footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile/border.css') }}">
    <link rel="stylesheet" href="{{ asset('css/informasi_home/eskul_guest.css') }}">
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


    <h1 class="eskul-title">Informasi Ekstrakurikuler</h1>

    <div class="ekskul-container mt-8 px-4">
        @if ($eskuls->isEmpty())
        <p class="ekskul-no-info text-center">Belum ada informasi ekstrakurikuler yang tersedia.</p>
        @else
        <div class="row">
            @foreach ($eskuls as $eskul)
            <div class="col-md-4 mb-4">
                <div class="ekskul-card">
                    <!-- Logo -->
                    @if ($eskul->logo)
                    <div class="ekskul-logo-container">
                        <img src="{{ asset('storage/' . $eskul->logo) }}"
                            alt="{{ $eskul->name }}"
                            class="ekskul-img">
                    </div>
                    @else
                    <div class="ekskul-no-logo">
                        <span class="ekskul-no-logo-text">Tidak ada logo</span>
                    </div>
                    @endif

                    <div class="ekskul-card-body">
                        <!-- Nama Ekskul -->
                        <h5 class="ekskul-title text-center">{{ $eskul->name }}</h5>

                        <!-- Deskripsi -->
                        <p class="ekskul-description">
                            {{ \Illuminate\Support\Str::limit($eskul->description, 100, '...') }}
                        </p>

                        <!-- Jadwal -->
                        <div class="ekskul-schedule text-center">
                            <span class="ekskul-badge">Jadwal: {{ $eskul->schedule }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>



    <!-- Bagian Peta dan footer -->
    <footer>
        @include('home.peta_footer')
    </footer>

</body>

</html>