<div>
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Filter</h5>
                </div>
                <div class="card-body">
                    <fieldset class="row justify-content-end">

                        <div class="col-12 col-md-2">
                            <label for="dateStart">Tampilkan <sub>/Halaman</sub></label>
                            <select name="" class="form-control select_searchable" wire:model="perPage">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="250">250</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-3 align-self-end">
                            <input type="text" wire:model.debounce.250ms="search" placeholder="Cari disini"
                                class="form-control">
                        </div>

                    </fieldset>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <h3 class="card-title">Daftar Halaman</h3>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-3 mb-3 mb-md-0">
                            <ul class="list-group">

                                @forelse ($pages as $page)

                                <li class="list-group-item {{ $active == $page->id ? 'active' : '' }}">
                                    <a href="javascript:void(0)"
                                        class="btn btn-block text-left {{ $active == $page->id ? 'text-white' : 'btn-link' }}"
                                        wire:click="preview('{{$page->id}}')" style="cursor: pointer">
                                        {{$page->name}}
                                    </a>
                                </li>

                                @empty

                                <li>
                                    <p class="text-center">Sayang sekali, page tidak ditemukan.</p>
                                </li>

                                @endforelse

                            </ul>
                        </div>

                        <div class="col-md-9">
                            @livewire('pages.contents-table', ['active' => $active])
                        </div>
                    </div>
                </div>
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
