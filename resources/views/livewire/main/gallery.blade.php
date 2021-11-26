<div>
    <section>
        <div class="container">
            <div class="card-body">
                <div class="mb-5">
                    <h3 class="title-text text-center text-white">Galeri</h3>
                </div>
            </div>
            <div class="row mt-3">

                @forelse ($galleries as $gallery)
                <div class="{{$view == 'grid' ? 'col-6 col-sm-4 col-md-3' : 'col-12'}} mb-3 gallery {{$view}}">
                    <div class="p-relative">
                        @if ($gallery->media_type == 'image')
                        <a class="spotlight" href="{{ $gallery->media_path }}" data-title="{{$gallery->name}}">
                            <img class="w-100" src="{{ $gallery->media_path }}" alt="{{ $gallery->alt }}">
                        </a>
                        @endif

                        @if ($gallery->media_type == 'video')
                        <a class="spotlight" data-title="{{$gallery->name}}" data-media="video"
                            data-src-webm="{{$gallery->media_path}}" data-src-ogg="{{$gallery->media_path}}"
                            data-src-mp4="{{$gallery->media_path}}" data-poster="{{$gallery->thumbnail}}"
                            data-autoplay="false" data-muted="true" data-preload="true" data-controls="true"
                            data-inline="false">
                            <img src="{{$gallery->thumbnail}}">
                        </a>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <img class="mb-5" width="200" src="{{asset('images/not_found.svg')}}" alt="">
                    <p>Mohon maaf, untuk saat ini galeri belum tersedia.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
</div>
