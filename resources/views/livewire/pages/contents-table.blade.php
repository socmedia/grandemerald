<div>
    <fieldset class="row justify-content-end mb-3">

        <div class="col-12 col-md-3 mb-3 mb-md-0 align-self-end">
            <input type="text" wire:model.debounce.250ms="search" placeholder="Cari disini" class="form-control">
        </div>

        <div class="col-12 col-md-3 text-right">
            <div class="btn-group">
                @if ($p != 'trash')
                <a href="{{route('adm.pages.create', ['reference' => $active])}}" class="btn btn-primary">Tambah</a>
                <a href="{{route('adm.pages.index', ['p' => 'trash'])}}" class="btn btn-secondary">Tong
                    Sampah</a>
                @else
                <a href="{{route('adm.pages.index', ['p' => 'main'])}}" class="btn btn-primary">Kembali</a>
                @endif
            </div>
        </div>

    </fieldset>

    <h3 class="card-title">Konten</h3>

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>Nama</th>
                            <th>Bagian</th>
                            <th>Status</th>
                            <th>Tanggal Pembuatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody wire:sortable="updateOrder">
                        @forelse ($contents as $content)
                        <tr wire:sortable.item="{{ $content->id }}" wire:key="content-{{ $content->id }}">
                            <td>
                                <a href="javascript:void(0)" class="btn btn-link"
                                    wire:click="preview('{{$content->id}}')"
                                    style="cursor: pointer">{{$content->name}}</a>
                            </td>
                            <td>{{$content->section}}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="{{$content->is_active}} dropdown-toggle text-capitalize"
                                        href="javascript:void(0)" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <small>{{$content->is_active ? 'Aktif' : 'Non Aktif'}}</small>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <button class="dropdown-item {{$content->is_active ? 'active' : ''}}"
                                            href="javascript:void(0);" wire:click="updateStatus('{{$content->id}}', 1)">
                                            Aktif
                                        </button>
                                        <button class="dropdown-item {{$content->is_active ? '' : 'active'}}"
                                            href="javascript:void(0);" wire:click="updateStatus('{{$content->id}}', 0)">
                                            Non Aktif
                                        </button>
                                    </div>
                                </div>

                            </td>
                            <td class="text-center">
                                {{$content->created_at->format('D d, M Y')}}
                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-light" type="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Pilih Aksi
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-more-vertical">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="12" cy="5" r="1"></circle>
                                            <circle cx="12" cy="19" r="1"></circle>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="active">

                                        <a class="dropdown-item"
                                            href="{{ route('adm.pages.edit', $content->id ) }}">Edit
                                            Halaman</a>
                                        <a class="dropdown-item"
                                            href="{{ route('adm.pages.list', $content->id ) }}">Lihat
                                            Halaman</a>

                                        {{-- <button type="button" class="dropdown-item" data-toggle="modal"
                                            data-target="#delete-confirmation"
                                            onclick="$('#delete-confirmation .btn-danger').attr('wire:click', 'delete(\'{{$content->id}}\')')">
                                            Hapus Permanen
                                        </button>
                                        <button class="dropdown-item" type="button"
                                            wire:click="{{!$content->deleted_at ? 'trash' : 'restore'}}('{{$content->id}}')">
                                            {{!$content->deleted_at ? 'Tong Sampah' : 'Pulihkan'}}
                                        </button> --}}

                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="6">Sayang sekali, page tidak ditemukan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" data-backdrop="static" role="dialog" id="previewModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data page</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-confirmation" data-backdrop="static" tabindex="-1"
        aria-labelledby="delete-confirmationLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered rounded">
            <div class="modal-content border-0">
                <div class="modal-header bg-danger text-white border-0">
                    <h5 class="modal-title" id="delete-confirmationLabel">Hapus komunitas</h5>
                    <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close"
                        style="position: absolute; right: 1rem; top: 1rem;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body border-0">
                    Anda yakin akan menghapus data ini ?
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-default text-dark shadow-sm rounded-lg"
                        data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger shadow-sm rounded-lg" wire:click="delete('')">
                        Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>
