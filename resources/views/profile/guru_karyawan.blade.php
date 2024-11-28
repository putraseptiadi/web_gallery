<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJIKOM</title>
    <link rel="stylesheet" href="{{ asset('css/profile/guru_karyawan.css') }}">
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

    <h2 class="guru-title">Guru dan Tenaga Pendidikan</h2>

    <div class="guru-card-grid">
        @foreach($gurus as $guru)
        <div class="guru-card-item">
            <img src="{{ asset('storage/uploads/' . $guru->profile_picture) }}" alt="{{ $guru->name }}" class="guru-card-image">
            <div class="guru-name-container">
                <h3 class="guru-name-text">{{ $guru->name }}</h3>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination Links -->
    <div class="pagination-container">
        @if ($gurus->hasPages())
        <ul class="pagination">
            {{-- Tombol Previous --}}
            @if ($gurus->onFirstPage())
            <li class="disabled"><span>&laquo; Previous</span></li>
            @else
            <li><a href="{{ $gurus->previousPageUrl() }}" rel="prev">&laquo; Previous</a></li>
            @endif

            {{-- Nomor Halaman --}}
            @foreach ($gurus->getUrlRange(1, $gurus->lastPage()) as $page => $url)
            @if ($page == $gurus->currentPage())
            <li class="active"><span>{{ $page }}</span></li>
            @else
            <li><a href="{{ $url }}">{{ $page }}</a></li>
            @endif
            @endforeach

            {{-- Tombol Next --}}
            @if ($gurus->hasMorePages())
            <li><a href="{{ $gurus->nextPageUrl() }}" rel="next">Next &raquo;</a></li>
            @else
            <li class="disabled"><span>Next &raquo;</span></li>
            @endif
        </ul>
        @endif
    </div>




    <!-- Bagian Peta dan footer -->
    <footer>
        @include('home.peta_footer')
    </footer>

</body>

</html>