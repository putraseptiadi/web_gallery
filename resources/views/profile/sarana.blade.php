<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJIKOM</title>
    <link rel="stylesheet" href="{{ asset('css/profile/sarpras.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile/border.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar_footer/navbar_footer.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


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

    <h2 class="sarpras-title">Foto Sarana & Prasarana</h2>

    <!-- Sarana & Prasarana Section -->
    <section class="sarpras-section">
        <div class="container">
            <div class="row">
                @foreach(\App\Models\Sarpras::all() as $sarpras)
                <div class="col-md-4 mb-4">
                    <div class="sarpras-card">
                        <div class="sarpras-img-container">
                            <img src="{{ asset('storage/sarpras/' . $sarpras->photo_path) }}" alt="{{ $sarpras->name }}" class="sarpras-img">
                        </div>
                        <div class="sarpras-content">
                            <h3 class="font-bold">{{ $sarpras->name }}</h3>
                            <p class="description">{{ Str::limit($sarpras->description, 50) }}</p>
                            <!-- Tombol untuk membuka modal -->
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sarprasModal{{ $sarpras->id }}">View More</a>
                        </div>
                    </div>
                </div>

                <!-- Modal Pop-up -->
                <div class="modal fade" id="sarprasModal{{ $sarpras->id }}" tabindex="-1" aria-labelledby="sarprasModalLabel{{ $sarpras->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="sarprasModalLabel{{ $sarpras->id }}">{{ $sarpras->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="{{ asset('storage/sarpras/' . $sarpras->photo_path) }}" alt="{{ $sarpras->name }}" class="img-fluid mb-3">
                                <p>{{ $sarpras->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>



    <!-- Footer -->
    <footer>
        @include('home.peta_footer')
    </footer>

</body>

</html>