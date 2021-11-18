<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{route('adm.index')}}" class="sidebar-brand">
            <img src="{{asset('images/logo.svg')}}" height="30" alt="Logo">
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">

            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{request()->routeIs('adm.index') ? 'active' : '' }}">
                <a href="{{ route('adm.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item nav-category">Konten</li>

            <li class="nav-item {{ request()->routeIs('adm.banner.*') ? 'active' : '' }}">
                <a href="{{route('adm.banner.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="image"></i>
                    <span class="link-title">Banner</span>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('adm.product.*') ? 'active' : '' }}">
                <a href="{{route('adm.product.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Apartemen</span>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('adm.faq.*') ? 'active' : '' }}">
                <a href="{{route('adm.faq.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">FAQ</span>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('adm.pages.*') ? 'active' : '' }}">
                <a href="{{route('adm.pages.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="layout"></i>
                    <span class="link-title">Halaman</span>
                </a>
            </li>

            <li class="nav-item nav-category">Lainnya</li>
            <li class="nav-item {{ request()->routeIs('adm.lead.*') ? 'active' : '' }}">
                <a href="{{route('adm.lead.index')}}" class="nav-link">
                    <i class="link-icon" data-feather="bookmark"></i>
                    <span class="link-title">Lead</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
