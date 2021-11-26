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
<livewire:main.contact />
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
    })
</script>
@endpush
