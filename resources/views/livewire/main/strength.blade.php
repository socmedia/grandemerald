<div>
    <section>
        <div class="content">
            {{--
            <!-- Residence Location Section -->
            <div class="card-body">
                <h2 class="highlight">Lokasi Perumahan</h2>
                <p class="description text-center mx-auto">
                    Jl. Jend. Sarwo Edhie Wibowo Jl. Emerald No.91, Seneng Satu, Banyurojo, Kec. Mertoyudan,
                    Magelang, Jawa Tengah 56172
                </p>
            </div>

            <!-- Maps Section -->
            <div class="py-4">
                <iframe class="maps"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.5906622751163!2d110.21071661486138!3d-7.510357794582865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a8f227023c619%3A0x2618e026e859427a!2sGrand%20Emerald%20Residence!5e0!3m2!1sid!2sid!4v1636181743867!5m2!1sid!2sid"
                    width="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div> --}}

            @foreach ($contents as $item)

            <div class="card-body">
                <h2 class="title-text">
                    {{$item->title_normal}}
                    @if ($item->title_secondary)
                    <span class="highlight"> {{ $item->title_secondary }}</span>
                    @endif
                </h2>
                <p class="description text-center mx-auto">{{$item->description}}</p>
            </div>

            @if (strpos($item->title_secondary, 'Lokasi') !== false)
            <div class="py-4">
                <div class="masonry">
                    <div class="brick">
                        <figcaption>
                            <h5>5 View Pegunungan</h5>
                        </figcaption>
                        <img src="{{ asset('images/mountains.jpg') }}" alt="">
                    </div>
                    <div class="brick">
                        <figcaption>
                            <h5>Grand Artos Hotel</h5>
                            <p class="text-center">5 Menit</p>
                        </figcaption>
                        <img src="{{ asset('images/artos_hotel.jpg') }}" alt="">
                    </div>
                    <div class="brick">
                        <figcaption>
                            <h5>Armada Town Square</h5>
                            <p class="text-center">5 Menit</p>
                        </figcaption>
                        <img src="{{ asset('images/artos_mall.jpg') }}" alt="">
                    </div>
                    <div class="brick">
                        <figcaption>
                            <h5>Front One Resort</h5>
                            <p class="text-center">5 Menit</p>
                        </figcaption>
                        <img src="{{ asset('images/front_one_resort.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            @endif

            @if (strpos($item->title_secondary, 'Bonus') !== false)
            <div class="container">
                <div class="row py-4">
                    <div class="col-6 col-md-3 mb-3 text-center">
                        <div class="card card-bonus">
                            <div class="card-body">
                                <img class="img-fluid" src="{{asset('images/ppn.png')}}" alt="">
                                <p class="h4">PPN</p>
                                <p class=""><em>(Pajak Pertambahan Nilai)</em></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 mb-3 text-center">
                        <div class="card card-bonus">
                            <div class="card-body">
                                <img class="img-fluid" src="{{asset('images/ajb.png')}}" alt="">
                                <p class="h4">AJB</p>
                                <p class=""><em>(Akta Jual Beli)</em></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 mb-3 text-center">
                        <div class="card card-bonus">
                            <div class="card-body">
                                <img class="img-fluid" src="{{asset('images/bphtb.png')}}" alt="">
                                <p class="h4">BPHTB</p>
                                <p class=""><em>(Bea Perolehan Hak atas Tanah dan Bangunan)</em></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 mb-3 text-center">
                        <div class="card card-bonus">
                            <div class="card-body">
                                <img class="img-fluid" src="{{asset('images/bbn.png')}}" alt="">
                                <p class="h4">BBN</p>
                                <p class=""><em>(Bea Balik Nama)</em></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @endforeach

        </div>
    </section>
</div>
