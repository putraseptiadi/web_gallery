<div class="guru-section">
    <h2 class="guru-title">Guru dan Tenaga Pendidikan</h2>
    <div class="carousel-container">
        <div class="guru-grid">
            @foreach($gurus as $guru)
            <div class="guru-card">
                <img src="{{ asset('storage/uploads/' . $guru->profile_picture) }}" alt="{{ $guru->name }}">
                <div class="name-container">
                    <h3>{{ $guru->name }}</h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <a href="{{ url('profile/guru_karyawan') }}" class="guru-btn">Tampilkan Lainnya</a>
</div>