<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ Request::is('transaksi/*') ? '' : 'collapsed' }}" data-bs-target="#components-1"
                data-bs-toggle="collapse" href="#"
                aria-expanded="{{ Request::is('transaksi/*') ? true : false }}">
                <i class="bi bi-menu-button-wide"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-1" class="nav-content collapse {{ Request::is('transaksi/*') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('pemesanan.index') }}">
                        <i class="bi bi-circle"></i><span>Pemesanan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('masuk.index') }}">
                        <i class="bi bi-circle"></i><span>Pemasukan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('keluar.index') }}">
                        <i class="bi bi-circle"></i><span>Pengeluaran</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link {{ Request::is('laporan/*') ? '' : 'collapsed' }}" data-bs-target="#components-1"
                data-bs-toggle="collapse" href="#" aria-expanded="{{ Request::is('laporan/*') ? true : false }}">
                <i class="bi bi-menu-button-wide"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-1" class="nav-content collapse {{ Request::is('laporan/*') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('jurnal.index') }}">
                        <i class="bi bi-circle"></i><span>Jurnal</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Produk</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('produk.index') }}">
                        <i class="bi bi-circle"></i><span>Produk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kategori.index') }}">
                        <i class="bi bi-circle"></i><span>Kategori</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('rekanan/*') ? '' : 'collapsed' }}" data-bs-target="#components-nav"
                data-bs-toggle="collapse" href="#"
                aria-expanded="{{ Request::is('rekanan/*') ? true : false }}>
                <i class="bi
                bi-menu-button-wide"></i><span>Rekanan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content {{ Request::is('rekanan/*') ? '' : 'show' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('sales.index') }}">
                        <i class="bi bi-circle"></i><span>Sales</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('mitra.index') }}">
                        <i class="bi bi-circle"></i><span>Mitra</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->



    </ul>

</aside>
