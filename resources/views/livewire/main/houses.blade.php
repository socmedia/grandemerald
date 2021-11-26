<div>
    @foreach ($contents as $content)
    <section class="overlay-bottom have-button" style="background-image: url({{$content->image}})">
        <div class="container-fluid">
            <div class="card-body bottom-text">
                <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <h3 class="title-text d-flex">{{$content->title_normal}}
                            @if ($content->title_secondary)
                            <span class="ml-2 highlight">{{$content->title_secondary}}</span>
                            @endif
                        </h3>
                    </div>
                    <div class="col-md-6 text-left text-md-right">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-light mr-2" data-toggle="modal"
                                data-target="#{{strtolower($content->title_secondary)}}-spec-modal">Lihat
                                Spesifikasi</button>
                            <button type="button" class="btn btn-light" data-toggle="modal"
                                data-target="#{{strtolower($content->title_secondary)}}-skecth-modal">Lihat
                                Denah</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Spesification Modal --}}
        <div class="modal fade" id="{{strtolower($content->title_secondary)}}-spec-modal" data-backdrop="static"
            data-keyboard="false" tabindex="-1"
            aria-labelledby="{{strtolower($content->title_secondary)}}-spec-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <nav class="navbar">
                            <div class="logo">
                                <img class="logo-md" src="{{ asset('images/logo_with_text.svg') }}" alt="logo long">
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.4099 11.9999L17.7099 7.70994C17.8982 7.52164 18.004 7.26624 18.004 6.99994C18.004 6.73364 17.8982 6.47825 17.7099 6.28994C17.5216 6.10164 17.2662 5.99585 16.9999 5.99585C16.7336 5.99585 16.4782 6.10164 16.2899 6.28994L11.9999 10.5899L7.70994 6.28994C7.52164 6.10164 7.26624 5.99585 6.99994 5.99585C6.73364 5.99585 6.47824 6.10164 6.28994 6.28994C6.10164 6.47825 5.99585 6.73364 5.99585 6.99994C5.99585 7.26624 6.10164 7.52164 6.28994 7.70994L10.5899 11.9999L6.28994 16.2899C6.19621 16.3829 6.12182 16.4935 6.07105 16.6154C6.02028 16.7372 5.99414 16.8679 5.99414 16.9999C5.99414 17.132 6.02028 17.2627 6.07105 17.3845C6.12182 17.5064 6.19621 17.617 6.28994 17.7099C6.3829 17.8037 6.4935 17.8781 6.61536 17.9288C6.73722 17.9796 6.86793 18.0057 6.99994 18.0057C7.13195 18.0057 7.26266 17.9796 7.38452 17.9288C7.50638 17.8781 7.61698 17.8037 7.70994 17.7099L11.9999 13.4099L16.2899 17.7099C16.3829 17.8037 16.4935 17.8781 16.6154 17.9288C16.7372 17.9796 16.8679 18.0057 16.9999 18.0057C17.132 18.0057 17.2627 17.9796 17.3845 17.9288C17.5064 17.8781 17.617 17.8037 17.7099 17.7099C17.8037 17.617 17.8781 17.5064 17.9288 17.3845C17.9796 17.2627 18.0057 17.132 18.0057 16.9999C18.0057 16.8679 17.9796 16.7372 17.9288 16.6154C17.8781 16.4935 17.8037 16.3829 17.7099 16.2899L13.4099 11.9999Z"
                                        fill="white" />
                                </svg>
                            </button>
                        </nav>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-white text-center mb-5">Spesifikasi {{$content->title_normal}}
                            @if ($content->title_secondary)
                            <span class="ml-2 highlight">{{$content->title_secondary}}</span>
                            @endif
                        </h3>

                        <div class="row justify-content-center">
                            @foreach ($content->groups as $i => $groups)

                            @if ($i !== 'Sketch')
                            <div class="col-md-3 mb-3 mb-md-0">
                                <h4 class="sub-title">{{substr($i, 14)}}</h4>
                                <div class="table-responsive">
                                    <table class="table table-stripped">
                                        @foreach ($groups as $item)
                                        <tr>
                                            <td>
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.96991 4.97004C9.11078 4.83593 9.29824 4.76179 9.49273 4.76326C9.68722 4.76473 9.87354 4.8417 10.0124 4.97793C10.1512 5.11416 10.2317 5.29899 10.2368 5.49342C10.2419 5.68785 10.1713 5.87667 10.0399 6.02004L6.04991 11.01C5.9813 11.0839 5.8985 11.1432 5.80645 11.1844C5.71439 11.2256 5.61498 11.2478 5.51416 11.2496C5.41334 11.2515 5.31318 11.233 5.21967 11.1953C5.12616 11.1575 5.04121 11.1013 4.96991 11.03L2.32391 8.38404C2.25023 8.31538 2.19112 8.23258 2.15013 8.14058C2.10914 8.04858 2.0871 7.94927 2.08532 7.84857C2.08355 7.74786 2.10207 7.64783 2.13979 7.55445C2.17751 7.46106 2.23366 7.37622 2.30488 7.305C2.37609 7.23379 2.46093 7.17764 2.55432 7.13992C2.6477 7.1022 2.74773 7.08367 2.84844 7.08545C2.94914 7.08723 3.04845 7.10927 3.14045 7.15026C3.23245 7.19125 3.31525 7.25036 3.38391 7.32404L5.47791 9.41704L8.94991 4.99204C8.95614 4.98432 8.96282 4.97698 8.96991 4.97004ZM8.04991 10.11L8.96991 11.03C9.0412 11.1012 9.12608 11.1573 9.2195 11.1949C9.31292 11.2325 9.41296 11.251 9.51366 11.2491C9.61436 11.2472 9.71365 11.2251 9.80561 11.184C9.89757 11.143 9.98032 11.0838 10.0489 11.01L14.0409 6.02004C14.1126 5.94924 14.1693 5.86472 14.2077 5.77152C14.246 5.67832 14.2651 5.57835 14.2639 5.47758C14.2628 5.37682 14.2413 5.27732 14.2008 5.18504C14.1603 5.09276 14.1017 5.00958 14.0283 4.94047C13.955 4.87137 13.8685 4.81775 13.7739 4.78282C13.6794 4.74789 13.5788 4.73237 13.4782 4.73718C13.3775 4.742 13.2789 4.76705 13.1881 4.81084C13.0973 4.85462 13.0163 4.91625 12.9499 4.99204L9.47691 9.41704L8.99191 8.93104L8.04891 10.11H8.04991Z"
                                                        fill="white" />
                                                </svg>
                                            </td>
                                            <td>{{ $item->attribute }}</td>
                                            <td>{!! $item->value !!}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            @endif

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="{{strtolower($content->title_secondary)}}-skecth-modal" data-backdrop="static"
            data-keyboard="false" tabindex="-1"
            aria-labelledby="{{strtolower($content->title_secondary)}}-skecth-modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <nav class="navbar">
                            <div class="logo">
                                <img class="logo-md" src="{{ asset('images/logo_with_text.svg') }}" alt="logo long">
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.4099 11.9999L17.7099 7.70994C17.8982 7.52164 18.004 7.26624 18.004 6.99994C18.004 6.73364 17.8982 6.47825 17.7099 6.28994C17.5216 6.10164 17.2662 5.99585 16.9999 5.99585C16.7336 5.99585 16.4782 6.10164 16.2899 6.28994L11.9999 10.5899L7.70994 6.28994C7.52164 6.10164 7.26624 5.99585 6.99994 5.99585C6.73364 5.99585 6.47824 6.10164 6.28994 6.28994C6.10164 6.47825 5.99585 6.73364 5.99585 6.99994C5.99585 7.26624 6.10164 7.52164 6.28994 7.70994L10.5899 11.9999L6.28994 16.2899C6.19621 16.3829 6.12182 16.4935 6.07105 16.6154C6.02028 16.7372 5.99414 16.8679 5.99414 16.9999C5.99414 17.132 6.02028 17.2627 6.07105 17.3845C6.12182 17.5064 6.19621 17.617 6.28994 17.7099C6.3829 17.8037 6.4935 17.8781 6.61536 17.9288C6.73722 17.9796 6.86793 18.0057 6.99994 18.0057C7.13195 18.0057 7.26266 17.9796 7.38452 17.9288C7.50638 17.8781 7.61698 17.8037 7.70994 17.7099L11.9999 13.4099L16.2899 17.7099C16.3829 17.8037 16.4935 17.8781 16.6154 17.9288C16.7372 17.9796 16.8679 18.0057 16.9999 18.0057C17.132 18.0057 17.2627 17.9796 17.3845 17.9288C17.5064 17.8781 17.617 17.8037 17.7099 17.7099C17.8037 17.617 17.8781 17.5064 17.9288 17.3845C17.9796 17.2627 18.0057 17.132 18.0057 16.9999C18.0057 16.8679 17.9796 16.7372 17.9288 16.6154C17.8781 16.4935 17.8037 16.3829 17.7099 16.2899L13.4099 11.9999Z"
                                        fill="white" />
                                </svg>
                            </button>
                        </nav>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-white text-center mb-5">Denah {{$content->title_normal}}
                            @if ($content->title_secondary)
                            <span class="ml-2 highlight">{{$content->title_secondary}}</span>
                            @endif
                        </h3>

                        @foreach ($content->groups as $i => $groups)
                        @if ($i == 'Sketch')
                        <div class="gallery-container" id="{{strtolower($content->title_secondary)}}-sketch">
                            @foreach ($groups as $item)
                            @if ($item->type == 'Sketch')
                            <a class="gallery-item" data-src="{{ $item->value }}"
                                data-sub-html="<p> Tipe {{$content->title_secondary}} - {{$item->attribute}}</p>">
                                <img alt="layers of blue." src="{{ $item->value }}" />
                            </a>
                            @endif
                            @endforeach
                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </section>
    @endforeach
</div>
