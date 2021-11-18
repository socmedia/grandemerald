@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
    .table td {
        white-space: unset !important;
    }

    textarea {
        height: 200px
    }
</style>
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Halaman</h4>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('adm.index')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{route('adm.pages.index')}}">Halaman</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
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

<div class="row">
    <div class="col-12">
        @livewire('pages.create')
    </div>
</div>

@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/promise-polyfill/polyfill.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
    $(function() {
    function initToast(text) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            timer: 5000,
            closeModal: true
        });

        Toast.fire({
            icon: 'success',
            title: text
        })
    }

    document.addEventListener('success', function(e) {
        initToast(e.detail);
    })

    document.addEventListener('updated', function(e) {
        $('#updateModal').modal('hide');
        initToast(e.detail);
    })

    $('.date_range').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD',
            cancelLabel: 'Clear'
        }
    })

    $('[name="date"]').change(function() {
        if ($(this).val() === 'custom') {
            $('.date_range_wrapper').removeClass('d-none');
            $('.date_range_wrapper input').val('');
        } else {
            $('.date_range_wrapper').addClass('d-none');
        }
    })

    $('#previewModal').on('hidden.bs.modal', function(e) {
        $(this).find('.modal-body').html('<p class="text-center">Loading...</p>')
    })

})
</script>
@endpush
