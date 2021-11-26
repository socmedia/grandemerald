@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="https://rawcdn.githack.com/nextapps-de/spotlight/0.7.8/dist/css/spotlight.min.css">
@endpush

@push('style')
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
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Galeri</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('adm.index')}}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Galeri</li>
        </ol>
    </nav>
</div>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sukses !</strong> {{session()->get('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row inbox-wrapper">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 email-content">
                        <livewire:gallery.table />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/promise-polyfill/polyfill.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="https://rawcdn.githack.com/nextapps-de/spotlight/0.7.8/dist/js/spotlight.min.js"></script>
@endpush

@push('custom-scripts')
<script>
    $(function() {
        function initToast(text) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                timer: 5000,
                timerProgressBar: true,
            });

            Toast.fire({
                icon: 'success',
                title: text
            })
        }

        Spotlight.init();

        document.addEventListener('success', function(e) {
            initToast(e.detail);
        })

        document.addEventListener('scroll', function() {

            let position = $(window).scrollTop();
            let bottom = $(document).height() - $(window).height();

            if( position > (bottom - 25) ){
                Livewire.emit('load-more')
            }
        })
    })
</script>
@endpush
