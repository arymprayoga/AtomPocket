<a href="#" class="brand-link">
    <span class="brand-text font-weight-light">AtomPocket</span>
</a>

<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('master/*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                        Master Data
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('data-dompet') }}"
                        class="nav-link {{ request()->is('master/data-dompet') ? 'active' : '' }}">
                        <i class="fas fa-wallet nav-icon"></i>
                        <p>Dompet</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('data-kategori') }}"
                        class="nav-link {{ request()->is('master/data-kategori') ? 'active' : '' }}">
                        <i class="fas fa-database nav-icon"></i>
                        <p>Kategori</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ request()->is('transaksi/*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                        Transaksi
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('data-masuk') }}"
                        class="nav-link {{ request()->is('transaksi/data-masuk') ? 'active' : '' }}">
                        <i class="fas fa-wallet nav-icon"></i>
                        <p>Dompet Masuk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('data-keluar') }}"
                        class="nav-link {{ request()->is('transaksi/data-keluar') ? 'active' : '' }}">
                        <i class="fas fa-database nav-icon"></i>
                        <p>Dompet Keluar</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-power-off"></i>
                    <p>
                        Logout
                    </p>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</div>
