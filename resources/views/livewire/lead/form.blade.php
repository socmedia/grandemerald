<div>
    <div class="form-card">
        <div class="form-card-body">

            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <form wire:submit.prevent="submitForm">
                <fieldset class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" wire:model.defer="nama_lengkap" id="nama_lengkap">

                    @error('nama_lengkap')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </fieldset>
                <fieldset class="form-group row">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" wire:model.defer="email" id="email" />

                        @error('email')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="whatsapp">Whatsapp</label>
                        <input type="text" class="form-control" wire:model.defer="whatsapp" id="whatsapp" />

                        @error('whatsapp')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </fieldset>
                <fieldset class="form-group mb-4">
                    <label for="pertanyaan">Pertanyaan</label>
                    <textarea class="form-control" wire:model.defer="pertanyaan" id="pertanyaan"></textarea>

                    @error('pertanyaan')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </fieldset>

                <div class="form-group text-center">
                    <button class="btn btn-light">
                        Kirim Pertanyaan
                        <div id="spinner" class="text-light ml-1" wire:loading wire:loading.class="loading"></div>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
