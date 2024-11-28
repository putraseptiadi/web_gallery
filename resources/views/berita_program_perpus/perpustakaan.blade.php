<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJIKOM</title>
    <link rel="stylesheet" href="{{ asset('css/navbar_footer/navbar_footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile/border.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bepropus/perpus_guest.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

    <h1 class="buku-title">Daftar Buku Perpustakaan</h1>

    <div class="buku-container mt-5">
        <div class="row mt-3">
            @foreach ($bukus as $buku)
            <div class="col-md-3">
                <div class="buku-card">
                    <img src="{{ $buku->foto ? asset('storage/' . $buku->foto) : 'https://via.placeholder.com/150' }}" class="buku-card-img-top" alt="Foto Buku">
                    <div class="buku-card-body">
                        <h5 class="buku-card-title">{{ $buku->judul }}</h5>
                        <p class="buku-card-text">
                            <strong>Penulis:</strong> {{ $buku->penulis }}<br>
                            <strong>Penerbit:</strong> {{ $buku->penerbit }}<br>
                            <strong>Tahun Terbit:</strong> {{ $buku->tahun_terbit }}<br>
                            <strong>Status:</strong>
                            <span class="badge @if ($buku->status == 'tersedia') badge-success @else badge-danger @endif">
                                {{ ucfirst($buku->status) }}
                            </span>
                        </p>
                        <!-- Tombol untuk memicu modal -->
                        @if($buku->status == 'tersedia')
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#statusModal{{ $buku->id }}">
                            {{ $buku->status }}
                        </a>
                        @else
                        <button class="btn btn-secondary" disabled>Buku Tidak Tersedia</button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Modal untuk masing-masing buku -->
            <div class="modal fade" id="statusModal{{ $buku->id }}" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel{{ $buku->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="statusModalLabel{{ $buku->id }}">Status Buku: {{ $buku->judul }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if($buku->status == 'tersedia')
                            <p>Buku ini tersedia untuk dipinjam.</p>
                            @else
                            <p>Maaf, buku ini tidak tersedia untuk dipinjam saat ini.</p>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    <!-- Bagian Peta dan footer -->
    <footer>
        @include('home.peta_footer')
    </footer>

</body>

</html>