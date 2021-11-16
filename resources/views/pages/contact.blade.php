@extends('layouts.guest')

@push('meta')
<!-- Primary Meta Tags -->
<title>Hubungi Kami | Grand Emerald Residence</title>
<meta name="title" content="Hubungi Kami | Grand Emerald Residence">
<meta name="description" content="Punya pertanyaan yang masih belum terjawab ? Kirim pertanyaan anda sekarang juga.">
<meta name="author" content="Greenpark Jogja" />
<meta name="keywords"
    content="grand emerald, grand emerald residence, grand emerald magelang, grand emerald residence magelang, magelang, perumahan, residence magelang" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ route('main.contact') }}">
<meta property="og:title" content="Hubungi Kami | Grand Emerald Residence">
<meta property="og:description"
    content="Punya pertanyaan yang masih belum terjawab ? Kirim pertanyaan anda sekarang juga.">
<meta property="og:image" content="{{asset('images/logo_secondary.svg')}}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ route('main.contact') }}">
<meta property="twitter:title" content="Hubungi Kami | Grand Emerald Residence">
<meta property="twitter:description"
    content="Punya pertanyaan yang masih belum terjawab ? Kirim pertanyaan anda sekarang juga.">
<meta property="twitter:image" content="{{asset('images/logo_secondary.svg')}}">
@endpush

@section('content')
<section class="environtment overlay-full">
    <div class="content container-fluid">
        <div class="card-body">
            <div class="mb-5">
                <h2 class="highlight">Hubungi Kami Sekarang</h2>
                <p class="description text-center mx-auto">
                    Isi formulir di bawah ini dan Konsultan Penjualan kami akan segera menghubungi Anda.
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="py-2">
                                <h3 class="highlight mb-0">Kantor Pemasaran</h3>
                                <p class="mb-0">Jl. A. Yani No. 25. Magelang, Jawa Tengah</p>
                            </div>
                            <div class="py-2">
                                <h3 class="highlight mb-0">Lokasi Perumahan</h3>
                                <p class="mb-0">Jl. Jend. Sarwo Edhie Wibowo Jl. Emerald No.91, Seneng Satu,
                                    Banyurojo, Kec.
                                    Mertoyudan, Magelang, Jawa Tengah 56172</p>
                            </div>
                            <div class="py-2">
                                <h3 class="highlight mb-0">Kontak</h3>
                                <p class="mb-0">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.6538 7.15092C16.9613 2.99986 11.4639 1.76576 7.20066 4.34615C3.0496 6.92654 1.70331 12.5361 4.39589 16.6871L4.62028 17.0237L3.72275 20.3894L7.08847 19.4919L7.42505 19.7163C8.88353 20.5016 10.4542 20.9504 12.0249 20.9504C13.7077 20.9504 15.3906 20.5016 16.8491 19.6041C21.0001 16.9115 22.2342 11.4142 19.6538 7.15092V7.15092ZM17.2978 15.7896C16.8491 16.4628 16.2881 16.9115 15.5028 17.0237C15.054 17.0237 14.4931 17.2481 12.2493 16.3506C10.342 15.453 8.77134 13.9946 7.64943 12.3117C6.97628 11.5264 6.63971 10.5166 6.52752 9.50693C6.52752 8.60941 6.86409 7.82407 7.42505 7.26312C7.64943 7.03873 7.87381 6.92654 8.09819 6.92654H8.65915C8.88353 6.92654 9.10791 6.92654 9.2201 7.37531C9.44448 7.93626 10.0054 9.28255 10.0054 9.39474C10.1176 9.50693 10.1176 9.73131 10.0054 9.8435C10.1176 10.0679 10.0054 10.2923 9.89325 10.4045C9.78105 10.5166 9.66886 10.741 9.55667 10.8532C9.33229 10.9654 9.2201 11.1898 9.33229 11.4142C9.78105 12.0873 10.342 12.7605 10.903 13.3214C11.5761 13.8824 12.2493 14.3311 13.0346 14.6677C13.259 14.7799 13.4834 14.7799 13.5955 14.5555C13.7077 14.3311 14.2687 13.7702 14.4931 13.5458C14.7175 13.3214 14.8296 13.3214 15.054 13.4336L16.8491 14.3311C17.0735 14.4433 17.2978 14.5555 17.41 14.6677C17.5222 15.0043 17.5222 15.453 17.2978 15.7896V15.7896Z"
                                            fill="#C2C2C2" />
                                    </svg>
                                    <a href="tel:+">+62 81391319047</a>
                                </p>
                                <p class="mb-0">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.6538 7.15092C16.9613 2.99986 11.4639 1.76576 7.20066 4.34615C3.0496 6.92654 1.70331 12.5361 4.39589 16.6871L4.62028 17.0237L3.72275 20.3894L7.08847 19.4919L7.42505 19.7163C8.88353 20.5016 10.4542 20.9504 12.0249 20.9504C13.7077 20.9504 15.3906 20.5016 16.8491 19.6041C21.0001 16.9115 22.2342 11.4142 19.6538 7.15092V7.15092ZM17.2978 15.7896C16.8491 16.4628 16.2881 16.9115 15.5028 17.0237C15.054 17.0237 14.4931 17.2481 12.2493 16.3506C10.342 15.453 8.77134 13.9946 7.64943 12.3117C6.97628 11.5264 6.63971 10.5166 6.52752 9.50693C6.52752 8.60941 6.86409 7.82407 7.42505 7.26312C7.64943 7.03873 7.87381 6.92654 8.09819 6.92654H8.65915C8.88353 6.92654 9.10791 6.92654 9.2201 7.37531C9.44448 7.93626 10.0054 9.28255 10.0054 9.39474C10.1176 9.50693 10.1176 9.73131 10.0054 9.8435C10.1176 10.0679 10.0054 10.2923 9.89325 10.4045C9.78105 10.5166 9.66886 10.741 9.55667 10.8532C9.33229 10.9654 9.2201 11.1898 9.33229 11.4142C9.78105 12.0873 10.342 12.7605 10.903 13.3214C11.5761 13.8824 12.2493 14.3311 13.0346 14.6677C13.259 14.7799 13.4834 14.7799 13.5955 14.5555C13.7077 14.3311 14.2687 13.7702 14.4931 13.5458C14.7175 13.3214 14.8296 13.3214 15.054 13.4336L16.8491 14.3311C17.0735 14.4433 17.2978 14.5555 17.41 14.6677C17.5222 15.0043 17.5222 15.453 17.2978 15.7896V15.7896Z"
                                            fill="#C2C2C2" />
                                    </svg>
                                    <a href="tel:+">+62 82323197544</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form wire:submit.prevent="">
                                <fieldset class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap">
                                </fieldset>
                                <fieldset class="form-group row">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="whatsapp">Whatsapp</label>
                                        <input type="text" class="form-control" name="whatsapp" id="whatsapp" />
                                    </div>
                                </fieldset>
                                <fieldset class="form-group mb-4">
                                    <label for="pertanyaan">Pertanyaan</label>
                                    <textarea class="form-control" name="pertanyaan" id="pertanyaan"></textarea>
                                </fieldset>

                                <div class="form-group text-center">
                                    <button class="btn btn-light">Kirim Pertanyaan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
