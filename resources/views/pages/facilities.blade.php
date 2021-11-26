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
<livewire:main.facilities />
@endsection
