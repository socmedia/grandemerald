<div>
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <h3 class="card-title">Daftar</h3>
                        </div>
                        <div class="col-12 col-md-6 text-right">
                            <a href="{{route('adm.pages.index')}}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form wire:submit.prevent="savePage" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="image">Gambar</label>
                                    <input type="file" accept="image/*" class="form-control" wire:model="image"
                                        id="image">

                                    @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="name">Nama Halaman</label>
                                        <select wire:model="name" id="name" class="form-control">
                                            @foreach ($routes as $route)
                                            <option value="{{ $route['url'] }}">
                                                {{$route['url'] == '/' ? 'homepage' : $route['url']}}
                                            </option>
                                            @endforeach
                                        </select>

                                        <input type="hidden" wire:model="route_name">

                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-10 col-md-4">
                                        <label for="section">Bagian</label>
                                        <input type="text" class="form-control" wire:model.defer="section" id="section">

                                        @error('section')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-2 col-md-2">
                                        <label for="order">Urutan</label>
                                        <input type="text" class="form-control" wire:model.defer="order" id="order"
                                            readonly>

                                        @error('order')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="title">Judul Section</label>
                                    <input type="text" class="form-control" wire:model.defer="title" id="title">

                                    @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Deskripsi Section</label>
                                    <textarea class="form-control" wire:model.defer="description" style="height: 100px"
                                        id="description"></textarea>

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
            </div>
        </div>
    </div>

</div>
