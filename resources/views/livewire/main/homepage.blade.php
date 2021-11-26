<div>
    @foreach ($contents as $content)
    <section class="overlay-bottom" style="background-image: url({{ $content->image }})">
        <div class="container-fluid">
            <div class="card-body title">
                <h3 class="title-text">
                    {{$content->title_normal}}
                    @if ($content->title_secondary)
                    <span class="highlight"> {{ $content->title_secondary }}</span>
                    @endif
                </h3>
                <p class="description">{{$content->description}}</p>
            </div>
        </div>
    </section>
    @endforeach

    <livewire:main.contact />
</div>
