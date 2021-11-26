@extends('layouts.guest')

@push('meta')
<!-- Primary Meta Tags -->
<title>Galeri | Grand Emerald Residence</title>
<meta name="title" content="Galeri | Grand Emerald Residence">
<meta name="description"
    content="Grand Emerald Residence - Temukan gambar/vidio yang menarik seputar perumahan kami hanya di website Grand Emerald Residence">
<meta name="author" content="Grand Emerald Residence" />
<meta name="keywords"
    content="grand emerald, grand emerald residence, grand emerald magelang, grand emerald residence magelang, magelang, perumahan, residence magelang" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ route('main.gallery') }}">
<meta property="og:title" content="Galeri | Grand Emerald Residence">
<meta property="og:description"
    content="Grand Emerald Residence - Temukan gambar/vidio yang menarik seputar perumahan kami hanya di website Grand Emerald Residence">
<meta property="og:image" content="{{asset('images/logo_secondary.svg')}}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ route('main.gallery') }}">
<meta property="twitter:title" content="Galeri | Grand Emerald Residence">
<meta property="twitter:description"
    content="Grand Emerald Residence - Temukan gambar/vidio yang menarik seputar perumahan kami hanya di website Grand Emerald Residence">
<meta property="twitter:image" content="{{asset('images/logo_secondary.svg')}}">
@endpush

@push('custom-styles')
<link rel="stylesheet" href="{{ asset('vendor/spotlight/css/spotlight.min.css') }}">
<style>
    .dropdown-grid {
        position: absolute;
        top: 6px;
        right: 21px
    }

    .dropdown-grid .btn-light {
        opacity: .5;
    }

    a.spotlight {
        display: flex;
        width: 100%
    }

    a.spotlight img {
        cursor: pointer
    }

    .gallery.grid img,
    .gallery.grid video {
        object-fit: cover;
        width: 100%;
        max-height: 190px;
        aspect-ratio: 16/9;
    }

    .gallery.list img,
    .gallery.list video {
        object-fit: cover;
        width: auto;
        width: 100%;
        max-height: 100px;
        aspect-ratio: 16/9;
    }
</style>
@endpush

@section('content')
<livewire:main.gallery />
@endsection

@push('custom-scripts')
<script src="{{ asset('vendor/spotlight/js/spotlight.min.js') }}"></script>
<script>
    Spotlight.init();

    document.addEventListener('scroll', function() {
        let position = $(window).scrollTop();
        let bottom = $(document).height() - $(window).height();
        if( position > (bottom - 25) ){
            Livewire.emit('load-more')
        }
    })
</script>
@endpush
