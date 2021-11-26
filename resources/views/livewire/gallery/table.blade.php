<div>
    <div class="email-inbox-header">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="email-title mb-2 mb-md-0">
                    <h5>Semua Gambar & Vidio</h5>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="email-search">
                    <div class="input-group input-search">
                        <input class="form-control" type="text" placeholder="Cari gambar atau vidio..."
                            wire:model.debounce.250ms="search">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="email-filters">
        @if ($search)
        <div class="w-100 mb-2">
            @if ($search)
            <a href="javascript:void(0)" class="d-inline text-white" wire:click="$set('search', null)">
                <small class="px-2 py-1 bg-secondary mr-1 mb-1 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x-circle">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg> {{$search}}
                </small>
            </a>
            @endif
        </div>
        @endif

        <div class="row">
            <div class="col-md-6 mb-3 mb-md-0 d-flex flex-wrap justify-content-center justify-content-md-start">

            </div>
            <div class="col-md-6 align-self-start text-right">
                <div class="btn-group">
                    <a href="{{route('adm.gallery.create')}}" class="btn btn-primary">
                        <i class="bx bxs-trash mr-1" style="font-size: 13px"></i>
                        Tambah
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="email-list">
        <div class="row mt-3">
            <div class="col-12 mb-3 text-right">
                <div class="btn-group">
                    <button class="btn btn-light px-2 py-1 {{$view == 'grid' ? 'disabled' : ''}}"
                        wire:click="$set('view', 'grid')">
                        <small><i class="mdi mdi-view-module"></i></small>
                    </button>
                    <button class="btn btn-light px-2 py-1 {{$view == 'list' ? 'disabled' : ''}}"
                        wire:click="$set('view', 'list')">
                        <small><i class="mdi mdi-view-list"></i></small>
                    </button>
                </div>
            </div>

            @forelse ($galleries as $gallery)
            <div class="{{$view == 'grid' ? 'col-6 col-sm-4 col-md-3' : 'col-12'}} mb-3 gallery {{$view}}">
                @if ($view == 'grid')
                <div class="p-relative">
                    @if ($gallery->media_type == 'image')
                    <a class="spotlight" href="{{ $gallery->media_path }}" data-title="{{$gallery->name}}"
                        data-description="{{ $gallery->media_path }}">
                        <img class="w-100" src="{{ $gallery->media_path }}" alt="{{ $gallery->alt }}">
                    </a>
                    @endif

                    @if ($gallery->media_type == 'video')
                    <a class="spotlight" data-media="video" data-src-webm="{{$gallery->media_path}}"
                        data-src-ogg="{{$gallery->media_path}}" data-src-mp4="{{$gallery->media_path}}"
                        data-poster="{{$gallery->thumbnail}}" data-autoplay="false" data-muted="true"
                        data-preload="true" data-controls="true" data-inline="false">
                        <img src="{{$gallery->thumbnail}}">
                    </a>
                    @endif

                    <div class="dropdown dropdown-grid">
                        <button class="btn btn-light p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-more-horizontal icon-md">
                                <circle cx="12" cy="12" r="1"></circle>
                                <circle cx="19" cy="12" r="1"></circle>
                                <circle cx="5" cy="12" r="1"></circle>
                            </svg>
                        </button>
                        <div class="dropdown-menu">
                            <button class="dropdown-item"
                                onclick="prompt('Salin link (CTRL+C)', '{{$gallery->media_path}}')">
                                Salin link</button>
                            <a class="dropdown-item" href="{{route('adm.gallery.edit', $gallery->id)}}">
                                Edit Gambar</a>
                            <button type="button" class="dropdown-item" data-toggle="modal"
                                data-target="#delete-confirmation"
                                onclick="$('#delete-confirmation .btn-danger').attr('wire:click', 'destroyMedia(\'{{$gallery->id}}\')')">
                                Hapus Permanen
                            </button>
                        </div>
                    </div>
                </div>

                @else

                <div class="card rounded">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">

                            <div class="d-flex align-items-center">
                                @if ($gallery->media_type == 'image')
                                <a class="spotlight" href="{{ $gallery->media_path }}" data-title="{{$gallery->name}}"
                                    data-description="{{ $gallery->media_path }}">
                                    <img src="{{ $gallery->media_path }}" alt="{{ $gallery->alt }}">
                                </a>
                                @endif

                                @if ($gallery->media_type == 'video')
                                <a class="spotlight" data-media="video" data-src-webm="{{$gallery->media_path}}"
                                    data-src-ogg="{{$gallery->media_path}}" data-src-mp4="{{$gallery->media_path}}"
                                    data-poster="{{$gallery->thumbnail}}" data-autoplay="false" data-muted="true"
                                    data-preload="true" data-controls="true" data-inline="false">
                                    <img src="{{$gallery->thumbnail}}">
                                </a>
                                @endif

                                <div class="ml-2">
                                    <p>{{$gallery->name}}</p>
                                    <p class="tx-11 text-muted">{{$gallery->media_path}}</p>
                                </div>
                            </div>

                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-more-horizontal icon-lg pb-3px">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="19" cy="12" r="1"></circle>
                                        <circle cx="5" cy="12" r="1"></circle>
                                    </svg>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">

                                    <button class="dropdown-item"
                                        onclick="prompt('Salin link (CTRL+C)', '{{$gallery->media_path}}')">
                                        Salin link</button>
                                    <a class="dropdown-item" href="{{route('adm.gallery.edit', $gallery->id)}}">
                                        Edit Gambar</a>
                                    <button type="button" class="dropdown-item" data-toggle="modal"
                                        data-target="#delete-confirmation"
                                        onclick="$('#delete-confirmation .btn-danger').attr('wire:click', 'destroyMedia(\'{{$gallery->id}}\')')">
                                        Hapus Permanen
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endif

            </div>
            @empty
            <div class="col-12">
                <p class="text-center">Gambar tidak ditemukan</p>
            </div>
            @endforelse
        </div>
    </div>

    <x-modal id="delete-confirmation" title="Hapus komunitas">
        Anda yakin akan menghapus data ini ?
        @slot('footer')
        <button type="button" class="btn btn-default text-dark shadow-sm rounded-lg" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger shadow-sm rounded-lg" wire:click="destroyMedia('{{$deleteId}}')">
            Hapus</button>
        @endslot
    </x-modal>

</div>
