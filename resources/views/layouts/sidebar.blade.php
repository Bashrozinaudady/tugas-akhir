<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        @hasanyrole('admin|staf')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('transaksi/*') ? '' : 'collapsed' }}" data-bs-target="#components-1"
                    data-bs-toggle="collapse" href="#"
                    aria-expanded="{{ Request::is('transaksi/*') ? true : false }}">
                    <i class="bi bi-menu-button-wide"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-1" class="nav-content collapse {{ Request::is('transaksi/*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li class="nav-item {{ Request::is('transaksi/pemesanan') ? 'active' : '' }}">
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
        @endhasanyrole
        @hasanyrole('admin')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('laporan/*') ? '' : 'collapsed' }}" data-bs-target="#components-2"
                    data-bs-toggle="collapse" href="#" aria-expanded="{{ Request::is('laporan/*') ? true : false }}">
                    <i class="bi bi-menu-button-wide"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-2" class="nav-content collapse {{ Request::is('laporan/*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('jurnal.index') }}">
                            <i class="bi bi-circle"></i><span>Jurnal</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-3" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Produk</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
                <a class="nav-link {{ Request::is('rekanan/*') ? '' : 'collapsed' }}" data-bs-target="#components-4"
                    data-bs-toggle="collapse" href="#" aria-expanded="{{ Request::is('rekanan/*') ? false : true }}">
                    <i class="bi bi-menu-button-wide"></i><span>Rekanan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-4" class="nav-content collapse {{ Request::is('rekanan/*') ? 'show' : '' }}"
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
        @endhasanyrole
        @hasanyrole('sistem admin')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('user/*') ? '' : 'collapsed' }}" data-bs-target="#components-5"
                    data-bs-toggle="collapse" href="#" aria-expanded="{{ Request::is('user/*') ? true : false }}">
                    <i class="bi bi-menu-button-wide"></i><span>Karyawan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-5" class="nav-content collapse {{ Request::is('user/*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('user.index') }}">
                            <i class="bi bi-circle"></i><span>Pengguna</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('jabatan.index') }}">
                            <i class="bi bi-circle"></i><span>Jabatan</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->
        @endhasanyrole
        {{-- <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav --> --}}

        <li class="nav-item">
            <a class="nav-link collapsed" href="javascript:void(0)">
                <i class="bi bi-lock"></i>
                <span>Keluar</span>
            </a>
        </li>

    </ul>

</aside>
