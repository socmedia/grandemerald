<div>
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <h3 class="card-title">Edit Konten</h3>
                        </div>
                        <div class="col-12 col-md-6 text-right">
                            <a href="{{route('adm.pages.index')}}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>

                @if ($page)
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form wire:submit.prevent="savePage" enctype="multipart/form-data">

                                <div class="form-group">
                                    @if ($content && !$image)
                                    <img class="img-fluid" src="{{ $content ? $content['image'] : '' }}" alt="">
                                    @endif

                                    @if($image)
                                    <img class="img-fluid" src="{{ $image ? $image->temporaryUrl() : ''}}" alt="">
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="name">Nama Halaman</label>
                                        <div class="form-control bg-light">{{ $page->name }}</div>
                                    </div>
                                    <div class="col-2 col-md-2 mb-3 mb-md-0">
                                        <label for="order">Urutan</label>
                                        <div class="form-control bg-light">{{ $content['order'] }}</div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="image">Gambar</label>
                                        <input type="file" accept="image/*" class="form-control" wire:model="image"
                                            id="image">

                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="title_normal">Judul Section (Warna Normal)</label>
                                        <input type="text" class="form-control" wire:model.defer="content.title_normal"
                                            id="title_normal">

                                        @error('title_normal')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="title_secondary">Judul Section (Warna Emas)</label>
                                        <input type="text" class="form-control" wire:model="content.title_secondary"
                                            id="title_secondary">

                                        @error('title_secondary')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description">Deskripsi Section</label>
                                    <textarea class="form-control" wire:model.defer="content.description"
                                        style="height: 100px" id="description"></textarea>

                                    @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group text-right">
                                    <button class="btn btn-dark">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @else

                <div class="card-body">
                    <h4 class="text-center">We're sorry, your request was not found.</h4>
                </div>
                @endif

            </div>
        </div>

        <livewire:pages.edit-attribute :contentId="request()->id" />
    </div>


</div>
