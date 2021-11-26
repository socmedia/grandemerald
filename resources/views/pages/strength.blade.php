@extends('layouts.guest')

@push('meta')
<!-- Primary Meta Tags -->
<title>Keunggulan | Grand Emerald Residence</title>
<meta name="title" content="Keunggulan | Grand Emerald Residence">
<meta name="description"
    content="Grand Emerald Residence - Kami memiliki lokasi yang strategis. Dekat dari perkotaan Magelang dan memiliki 5 view gunung yang membuat grand emerald residence menjadi perumahan dengan lokasi yang strategis di kota Magelang">
<meta name="author" content="Grand Emerald Residence" />
<meta name="keywords"
    content="grand emerald, grand emerald residence, grand emerald magelang, grand emerald residence magelang, magelang, perumahan, residence magelang" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ route('main.strength') }}">
<meta property="og:title" content="Keunggulan | Grand Emerald Residence">
<meta property="og:description"
    content="Grand Emerald Residence - Kami memiliki lokasi yang strategis. Dekat dari perkotaan Magelang dan memiliki 5 view gunung yang membuat grand emerald residence menjadi perumahan dengan lokasi yang strategis di kota Magelang">
<meta property="og:image" content="{{asset('images/logo.svg')}}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ route('main.strength') }}">
<meta property="twitter:title" content="Keunggulan | Grand Emerald Residence">
<meta property="twitter:description"
    content="Grand Emerald Residence - Kami memiliki lokasi yang strategis. Dekat dari perkotaan Magelang dan memiliki 5 view gunung yang membuat grand emerald residence menjadi perumahan dengan lokasi yang strategis di kota Magelang">
<meta property="twitter:image" content="{{asset('images/logo.svg')}}">
@endpush

@section('content')
<livewire:main.strength />
@endsection
