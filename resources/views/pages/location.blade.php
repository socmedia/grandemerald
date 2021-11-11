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
<section>
    <div class="content">

        <!-- Residence Location Section -->
        <div class="card-body">
            <h2 class="highlight">Lokasi Perumahan</h2>
            <p class="description text-center mx-auto">
                Jl. Jend. Sarwo Edhie Wibowo Jl. Emerald No.91, Seneng Satu, Banyurojo, Kec. Mertoyudan,
                Magelang, Jawa Tengah 56172
            </p>
        </div>

        <!-- Maps Section -->
        <div class="py-4">
            <iframe class="maps"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.5906622751163!2d110.21071661486138!3d-7.510357794582865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a8f227023c619%3A0x2618e026e859427a!2sGrand%20Emerald%20Residence!5e0!3m2!1sid!2sid!4v1636181743867!5m2!1sid!2sid"
                width="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <!-- Best Location Section -->
        <div class="card-body">
            <h2 class="highlight">Lokasi Terbaik</h2>
            <p class="description text-center mx-auto">
                <span class="highlight">Grand Emerald Residence</span> memliki lokasi strategis di daerah
                Magelang dengan lokasi yang asri. Sebuah Pilihan tempat untuk tempat tinggal yang nyaman dan
                investasi keluarga urban modern.
            </p>
        </div>

        <!-- Best Location Image Section -->
        <div class="py-4">
            <div class="masonry">
                <div class="brick">
                    <figcaption>
                        <h5>5 View Pegunungan</h5>
                    </figcaption>
                    <img src="{{ asset('images/mountains.jpg') }}" alt="">
                </div>
                <div class="brick">
                    <figcaption>
                        <h5>Grand Artos Hotel</h5>
                        <p class="text-center">5 Menit</p>
                    </figcaption>
                    <img src="{{ asset('images/artos_hotel.jpg') }}" alt="">
                </div>
                <div class="brick">
                    <figcaption>
                        <h5>Armada Town Square</h5>
                        <p class="text-center">5 Menit</p>
                    </figcaption>
                    <img src="{{ asset('images/artos_mall.jpg') }}" alt="">
                </div>
                <div class="brick">
                    <figcaption>
                        <h5>Front One Resort</h5>
                        <p class="text-center">5 Menit</p>
                    </figcaption>
                    <img src="{{ asset('images/front_one_resort.jpg') }}" alt="">
                </div>
            </div>
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
