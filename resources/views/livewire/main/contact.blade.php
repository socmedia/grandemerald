<div>
    <section class="overlay-full" style="background-image: url({{$content->image}})">
        <div class="content container-fluid">
            <div class="card-body">
                <div class="mb-5">
                    <h3 class="title-text text-center">
                        {{$content->title_normal}}
                        @if ($content->title_secondary)
                        <span class="highlight"> {{ $content->title_secondary }}</span>
                        @endif
                    </h3>
                    <p class="description text-center mx-auto">
                        {{$content->description}} </p>
                </div>

                <div class="row justify-content-center">

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                @foreach ($content->attributes as $item)
                                @if ($item->type == 'contact')
                                <div class="py-2">
                                    <h3 class="highlight mb-0">{{$item->attribute}}</h3>
                                    @if (strtolower($item->attribute) == 'kontak' ||
                                    strtolower($item->attribute) == 'contact' ||
                                    strtolower($item->attribute) == 'whatsapp' ||
                                    strtolower($item->attribute) == 'telp' ||
                                    strtolower($item->attribute) == 'telp.')
                                    <a href="tel:+{{$item->value}}">
                                        <svg class="mr-2" viewBox="0 0 24 24" width="16" height="16"
                                            stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" class="css-i6dzq1">
                                            <path
                                                d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                            </path>
                                        </svg>
                                        {{$item->value}}
                                    </a>
                                    @else
                                    <p class="mb-0">{{$item->value}}</p>
                                    @endif
                                </div>
                                @endif
                                @endforeach

                            </div>
                            <div class="col-md-6">
                                <livewire:lead.form />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
