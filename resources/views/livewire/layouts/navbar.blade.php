<header>
    <nav class="navbar-inverse navbar-lg navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a href="{{route('main.index')}}" class="navbar-brand pt-4"><img src="/images/logo.svg" alt="logo"></a>
            </div>

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown mm-menu">
                        <a class="page-scroll {{activeClassByRoute('main.index')}}"
                            href="{{route('main.index')}}">Beranda</a>
                    </li>

                    <li class="dropdown mm-menu">
                        <a class="page-scroll {{activeClassByRoute('main.about')}}"
                            href="{{route('main.about')}}">Tentang Kami</a>
                    </li>

                    <li class="dropdown mm-menu">
                        <a class="page-scroll {{activeClassByRoute('main.apartment')}}"
                            href="{{route('main.apartment')}}">Apartemen</a>
                    </li>

                    <li class="dropdown mm-menu">
                        <a class="page-scroll {{activeClassByRoute('main.review')}}"
                            href="{{route('main.review')}}">Ulasan</a>
                    </li>

                    <li class="dropdown mm-menu">
                        <a class="page-scroll {{activeClassByRoute('main.faq')}}" href="{{route('main.faq')}}">FAQ</a>
                    </li>

                    <li class="dropdown mm-menu">
                        <a class="page-scroll {{activeClassByRoute('main.contact')}}"
                            href="{{route('main.contact')}}">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
