<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="margin-left: 40px;">
            <img src="{{ asset('path/logo/smkn4.png') }}" alt="Logo SMKN 4" class="logo-smkn4">
            <span class="separator"></span>
            <img src="{{ asset('path/logo/SMK BISA.png') }}" alt="SMK BISA" class="logo-smk-bisa">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>

                <!-- Dropdown Profil -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('profile/*') ? 'active' : '' }}" href="#" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item {{ request()->is('profile/visi') ? 'active' : '' }}" href="{{ url('profile/visi') }}">Visi dan Misi</a></li>
                        <li><a class="dropdown-item {{ request()->is('profile/guru_karyawan') ? 'active' : '' }}" href="{{ url('profile/guru_karyawan') }}">Guru dan Karyawan</a></li>
                        <li><a class="dropdown-item {{ request()->is('profile/sarana') ? 'active' : '' }}" href="{{ url('profile/sarana') }}">Sarana dan Prasarana</a></li>
                        <li><a class="dropdown-item {{ request()->is('profile/galeri') ? 'active' : '' }}" href="{{ url('profile/galeri') }}">Galeri Foto</a></li>
                    </ul>
                </li>

                <!-- Dropdown Jurusan -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('jurusan/*') ? 'active' : '' }}" href="#" id="navbarDropdownJurusan" data-bs-toggle="dropdown" aria-expanded="false">
                        Jurusan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownJurusan">
                        <li><a class="dropdown-item {{ request()->is('jurusan/pplg') ? 'active' : '' }}" href="{{ url('jurusan/pplg') }}">PPLG</a></li>
                        <li><a class="dropdown-item {{ request()->is('jurusan/tkro') ? 'active' : '' }}" href="{{ url('jurusan/tkro') }}">TKRO</a></li>
                        <li><a class="dropdown-item {{ request()->is('jurusan/tjkt') ? 'active' : '' }}" href="{{ url('jurusan/tjkt') }}">TJKT</a></li>
                        <li><a class="dropdown-item {{ request()->is('jurusan/tflm') ? 'active' : '' }}" href="{{ url('jurusan/tflm') }}">TFLM</a></li>
                    </ul>
                </li>

                <!-- Dropdown Informasi -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('informasi/*') ? 'active' : '' }}" href="#" id="navbarDropdownInformasi" data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownInformasi">
                        <li><a class="dropdown-item {{ request()->is('informasi/informasi') ? 'active' : '' }}" href="{{ url('informasi/informasi') }}">Informasi Terkini</a></li>
                        <li><a class="dropdown-item {{ request()->is('informasi/agenda') ? 'active' : '' }}" href="{{ url('informasi/agenda') }}">Agenda</a></li>
                        <li><a class="dropdown-item {{ request()->is('informasi/osis') ? 'active' : '' }}" href="{{ url('informasi/osis') }}">Osis</a></li>
                        <li><a class="dropdown-item {{ request()->is('informasi/eskul') ? 'active' : '' }}" href="{{ url('informasi/eskul') }}">Ekstrakulikuler</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('berita') ? 'active' : '' }}" href="{{ url('berita') }}">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('perpustakaan') ? 'active' : '' }}" href="{{ url('perpustakaan') }}">Perpustakaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('program') ? 'active' : '' }}" href="{{ url('program') }}">Program</a>
                </li>

                <li class="nav-item">
                    <a class="login" href="{{ url('login') }}">LOGIN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>