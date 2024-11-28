<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UJIKOM</title>
    <link rel="stylesheet" href="{{ asset('css/navbar_footer/navbar_footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile/border.css') }}">
    <link rel="stylesheet" href="{{ asset('css/informasi_home/agenda_guest.css') }}">
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

    <h2 class="agenda-title">Daftar Agenda</h2>

    <section class="agendaa">
        @foreach($agenda as $item)
        <div class="agenda-item">
            <div class="agenda-date">{{ \Carbon\Carbon::parse($item->date)->format('d F Y') }}</div>
            <div class="agenda-details">
                <strong>{{ $item->title }}</strong>
                <p>{{ $item->description }}</p>
                <p>{{ $item->location }}</p>
            </div>
        </div>
        @endforeach
    </section>


    <!-- Bagian Peta dan footer -->
    <footer>
        @include('home.peta_footer')
    </footer>

</body>

</html>