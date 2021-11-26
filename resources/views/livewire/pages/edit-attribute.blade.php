<div class="col-12">
    <div class="card">

        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-6 mb-3 mb-md-0">
                    <h3 class="card-title">Edit Atribut</h3>
                </div>
                <div class="col-12 col-md-6 text-right">
                    <button class="btn btn-primary" wire:click="changeMode">Tambah
                        Atribut</button>
                </div>
            </div>
        </div>

        <div class="card-body">

            <div class="row justify-content-center">
                @if ($addMode)
                <div class="col-md-8">
                    <form wire:submit.prevent="createAttribute">

                        <div class="form-group row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="">Tipe atribut</label>
                                <input list="types" name="type" id="type" class="form-control"
                                    wire:model.defer="type" />

                                <datalist id="types">
                                    @foreach ($types as $type)
                                    <option value="{{$type}}">{{$type}}</option>
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="">Nama atribut</label>
                                <input class="form-control" wire:model="attribute" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Nilai atribut</label>
                            <textarea class="form-control" wire:model="value"></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-dark">Simpan</button>
                        </div>

                    </form>
                </div>
                @else
                <div class="col-md-8">
                    @foreach ($attributes as $i => $attribute)

                    <h5 class="text-capitalize mb-3">{{$i}}</h5>


                    @foreach ($attribute as $j => $child)

                    <?php if(strlen($child->value) < 192): ?>
                    <form wire:submit.prevent="saveAttribute('{{$i}}', {{$j}})">
                        <div class="form-group">
                            <label for="">{{$child->attribute}}</label>
                            <div class="input-group">
                                <input type="text" class="form-control"
                                    wire:model.defer="attributes.{{$i}}.{{$j}}.value" />
                                <div class="input-group-prepend">
                                    <button class="btn btn-dark">Simpan</button>
                                    <button class="btn btn-danger" type="button"
                                        wire:click="removeAttribute({{$child->id}})">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php else: ?>
                    <form wire:submit.prevent="saveAttribute({{$i}})">
                        <div class="form-group">
                            <label for="">{{$child->attribute}}</label>
                            <div class="input-group">
                                <textarea class="form-control"
                                    wire:model.defer="attributes.{{$i}}.{{$j}}.value"></textarea>
                                <div class="input-group-prepend">
                                    <button class="btn btn-dark">Simpan</button>
                                    <button class="btn btn-danger" type="button"
                                        wire:click="removeAttribute({{$child->id}})">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php endif; ?>

                    @endforeach

                    @if (!$loop->last)
                    <hr class="my-3">
                    @endif

                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
