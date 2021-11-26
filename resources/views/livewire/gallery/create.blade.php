<div>
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <h3 class="card-title">Tambah Ke Galeri</h3>
                        </div>
                        <div class="col-12 col-md-6 text-right">
                            <a href="{{route('adm.gallery.index')}}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form wire:submit.prevent="createMedia">

                                <div class="form-group">
                                    <label for="mediaType">Pilih Jenis Media</label>
                                    <select class="form-control" wire:model="mediaType">
                                        <option value="image">Gambar</option>
                                        <option value="video">Vidio</option>
                                    </select>
                                </div>

                                @if ($mediaType === 'image')
                                <div class="form-group text-center">
                                    @if ($media)
                                    <img class="w-75 rounded" src="{{$media->temporaryUrl()}}" alt="">
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="name">Nama Media</label>
                                        <input type="text" class="form-control" wire:model.defer="name">
                                        @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="alt">Text Alt.</label>
                                        <input type="text" class="form-control" wire:model.defer="alt">
                                        @error('alt')
                                        <small class="text-danger">{{$message}}</small>
                                        @else
                                        <small class="text-muted">
                                            <em>*Teks yang akan ditampilkan ketika gambar gagal dimuat.</em>
                                        </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="media">Gambar</label>
                                    <div class="custom-file">
                                        <input type="file" accept="image/*" class="custom-file-input"
                                            wire:model.defer="media" />
                                        <label class="custom-file-label" for="customFile">{{$media ?
                                            $media->getClientOriginalName() : 'Pilih
                                            gambar'}}</label>
                                    </div>
                                    @error('media')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                @else
                                <div class="form-group text-center">
                                    @if ($thumbnail && $media)
                                    <video class="w-100" controls preload="auto" loading="lazy"
                                        poster="{{$thumbnail->temporaryUrl()}}" data-setup="{}">
                                        <source src="{{$media->temporaryUrl()}}" type="video/mp4" />
                                    </video>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="name">Nama Media</label>
                                    <input type="text" class="form-control" wire:model.defer="name">
                                    @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">Thumbnail</label>
                                    <div class="custom-file">
                                        <input type="file" accept="image/*" class="custom-file-input"
                                            wire:model.defer="thumbnail" />
                                        <label class="custom-file-label" for="customFile">{{$thumbnail ?
                                            $thumbnail->getClientOriginalName() :
                                            'Pilih thumbnail'}}</label>
                                    </div>
                                    @error('thumbnail')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="media">Vidio</label>
                                    <div class="custom-file">
                                        <input type="file" accept="video/*" class="custom-file-input"
                                            wire:model.defer="media" />
                                        <label class="custom-file-label" for="customFile">{{$media ?
                                            $media->getClientOriginalName() : 'Pilih
                                            video'}}</label>
                                    </div>
                                    @error('media')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                @endif

                                <div class="form-group text-right">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
