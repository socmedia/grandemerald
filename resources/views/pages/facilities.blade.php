@extends('layouts.guest')

@push('meta')
<!-- Primary Meta Tags -->
<title>Greenpark Jogja Apartment | Dreamland of Jogja for Health Living</title>
<meta name="title" content="Greenpark Jogja Apartment | Dreamland of Jogja for Health Living">
<meta name="description"
    content="Greenpark Jogja Apartment mengusung konsep yang menyatu dengan alam dengan hamparan sawah, sungai kecil mengalir, dan view gunung merapi. Di areal keramaian kota namun jauh dari polusi udara memungkinkan sebagai hunian yang nyaman.">
<meta name="author" content="Greenpark Jogja Apartment" />
<meta name="keywords"
    content="apartemen,apartemen menengah,hunian jogja, greenpark jogja, greenpark jogja apartment,apartment jogja,apartemen jogja,apartemen lengkap, apartemen greenpark jogja,apartemen anak muda" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://greenparkjogja.com/">
<meta property="og:title" content="Greenpark Jogja Apartment | Dreamland of Jogja for Health Living">
<meta property="og:description"
    content="Greenpark Jogja Apartment mengusung konsep yang menyatu dengan alam dengan hamparan sawah, sungai kecil mengalir, dan view gunung merapi. Di areal keramaian kota namun jauh dari polusi udara memungkinkan sebagai hunian yang nyaman.">
<meta property="og:image" content="{{asset('images/logo.svg')}}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://greenparkjogja.com/">
<meta property="twitter:title" content="Greenpark Jogja Apartment | Dreamland of Jogja for Health Living">
<meta property="twitter:description"
    content="Greenpark Jogja Apartment mengusung konsep yang menyatu dengan alam dengan hamparan sawah, sungai kecil mengalir, dan view gunung merapi. Di areal keramaian kota namun jauh dari polusi udara memungkinkan sebagai hunian yang nyaman.">
<meta property="twitter:image" content="{{asset('images/logo.svg')}}">
@endpush

@section('content')
<!-- Mosque Section -->
<section class="mosque overlay-bottom">
    <div class="container-fluid">
        <div class="card-body title">
            <h3 class="title-text">Mushola</h3>
            <p class="description">
                Anda bisa menjadi lebih dekat dengan-Nya karena adanya Mushola di Grand Emerald Residence.
                Anda bisa ber-ibadah dengan tenang dan mudah.
            </p>
        </div>
    </div>
</section>

<!-- Clubhouse Section -->
<section class="clubhouse overlay-bottom">
    <div class="container-fluid">
        <div class="card-body title">
            <h3 class="title-text">Club House</h3>
            <p class="description">
                Memungkinkan untuk Anda membuat dan bergabung dengan "rooms" atau ruang, di mana di ruang
                ini Anda dapat mengobrol
                dengan orang lain maupun kerabat Anda.
            </p>
        </div>
    </div>
</section>

<!-- Residence Street Section -->
<section class="environtment overlay-bottom h-100vh">
    <div class="container-fluid">
        <div class="card-body title">
            <h3 class="title-text">Jalan Vasum Lebar 10m</h3>
            <p class="description">
                Jalanan yang lebar membuat Anda lebih fleksibel dalam melakukan aktivitas di luar ruangan
                dan
                memudahkan akses Anda di dalam Grand Emerald Residence.
            </p>
        </div>
    </div>
</section>

<!-- Swimming Pool Section -->
<section class="pool overlay-bottom">
    <div class="container-fluid">
        <div class="card-body title">
            <h3 class="title-text">
                Swimming Pool</h3>
            <p class="description">
                Jalanan yang lebar membuat Anda lebih fleksibel dalam melakukan aktivitas di luar ruangan
                dan
                memudahkan akses Anda di dalam Grand Emerald Residence.
            </p>
        </div>
    </div>
</section>

<!-- Fitness Section -->
<section class="fitness overlay-bottom">
    <div class="container-fluid">
        <div class="card-body title">
            <h3 class="title-text">Fitness</h3>
            <p class="description">
                Sudah menjadi kewajiban bagi Anda untuk menjaga kesehatan tubuh di tengah aktivitas Anda
                yang rumit. Fitness bisa menjadi pilihan yang tepat bagi Anda.
            </p>
        </div>
    </div>
</section>

<!-- Kids Playground Section -->
<section class="playground overlay-bottom">
    <div class="container-fluid">
        <div class="card-body title">
            <h3 class="title-text">Kids Play Ground</h3>
            <p class="description">
                Tingkatkan perkembangan kognitif, emosi, sosial, motorik anak Anda disini. Anda dapat
                menikmati kebersamaan dengan anak, lewat berbagai kegiatan.
            </p>
        </div>
    </div>
</section>

<!-- Garden Section -->
<section class="garden overlay-bottom">
    <div class="container-fluid">
        <div class="card-body title">
            <h3 class="title-text">Taman</h3>
            <p class="description">
                Tempat yang nyaman untuk bersantai dan berkumpul dengan siapapun. Lepaskan semua pikiran
                anda dan bersantailah di taman ini dan temukan ketenangan.
            </p>
        </div>
    </div>
</section>

<!-- Security Section -->
<section class="security overlay-bottom">
    <div class="container-fluid">
        <div class="card-body title">
            <h3 class="title-text">Security 24 Jam</h3>
            <p class="description">
                Dilengkapi dengan tim keamanan yang siap menjaga lingkungan perumahan selama 24 jam. Anda
                dapat dengan tenang meninggalkan hunian Anda.
            </p>
        </div>
    </div>
</section>
@endsection

@push('custom-scripts')
<script>
    $(function () {
        const pool = new Rellax('.rellax')
    })
</script>
@endpush
