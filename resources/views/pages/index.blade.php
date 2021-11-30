@extends('layouts.guest')

@push('meta')
<!-- Primary Meta Tags -->
<title>Grand Emerald Residence</title>
<meta name="title" content="Grand Emerald Residence | My Home My Sanctuary">
<meta name="description"
    content="Grand Emerald Residence - Perumahan Elite Magelang - Kembali ke alam telah menjadi mimpi yang hadir di benak setiap generasi sejak manusia pertama kali meninggalkan alam.">
<meta name="author" content="Grand Emerald Residence" />
<meta name="keywords"
    content="grand emerald, grand emerald residence, grand emerald magelang, grand emerald residence magelang, magelang, perumahan, residence magelang" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ route('main.index') }}">
<meta property="og:title" content="Grand Emerald Residence | My Home My Sanctuary">
<meta property="og:description"
    content="Grand Emerald Residence - Perumahan Elite Magelang - Kembali ke alam telah menjadi mimpi yang hadir di benak setiap generasi sejak manusia pertama kali meninggalkan alam.">
<meta property="og:image" content="{{asset('images/logo_secondary.svg')}}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ route('main.index') }}">
<meta property="twitter:title" content="Grand Emerald Residence | My Home My Sanctuary">
<meta property="twitter:description"
    content="Grand Emerald Residence - Perumahan Elite Magelang - Kembali ke alam telah menjadi mimpi yang hadir di benak setiap generasi sejak manusia pertama kali meninggalkan alam.">
<meta property="twitter:image" content="{{asset('images/logo_secondary.svg')}}">
@endpush

@section('content')
<livewire:main.homepage />
@endsection

@push('custom-scripts')
<script>
    $(function () {
        $('#whatsapp').on('input', function () {
            this.value = this.value.replace(/[^0-9+]/g, '');
            if (this.value.length <= 3) {
                this.value !== '+62' ? this.value = '+62' + this.value : false;
            }
            this.value=this.value.substr(0, 15)
        })

        document.addEventListener('whatsapp', function (e) {
            window.open(e.detail);
        })
    })
</script>
@endpush
