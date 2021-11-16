@extends('layouts.guest')

@push('meta')
<!-- Primary Meta Tags -->
<title>Fasilitas | Grand Emerald Residence</title>
<meta name="title" content="Fasilitas | Grand Emerald Residence">
<meta name="description"
    content="Grand Emerald Residence - Kami memiliki beberapa fasilitas perumahan yang bisa membuat anda lebih nyaman selama bertempat tinggal di Grand Emerald Residence">
<meta name="author" content="Grand Emerald Residence" />
<meta name="keywords"
    content="grand emerald, grand emerald residence, grand emerald magelang, grand emerald residence magelang, magelang, perumahan, residence magelang" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ route('main.facilities') }}">
<meta property="og:title" content="Fasilitas | Grand Emerald Residence">
<meta property="og:description"
    content="Grand Emerald Residence - Kami memiliki beberapa fasilitas perumahan yang bisa membuat anda lebih nyaman selama bertempat tinggal di Grand Emerald Residence">
<meta property="og:image" content="{{asset('images/logo_secondary.svg')}}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ route('main.facilities') }}">
<meta property="twitter:title" content="Fasilitas | Grand Emerald Residence">
<meta property="twitter:description"
    content="Grand Emerald Residence - Kami memiliki beberapa fasilitas perumahan yang bisa membuat anda lebih nyaman selama bertempat tinggal di Grand Emerald Residence">
<meta property="twitter:image" content="{{asset('images/logo_secondary.svg')}}">
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
