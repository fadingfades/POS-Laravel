<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Utama</h6>
                    <ul>
                        <li>
                            <a href="{{ route('dashboard') }}"><i data-feather="grid"></i><span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="pos.html"><i data-feather="hard-drive"></i><span>POS</span></a>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Inventory</h6>
                    <ul>
                        <li><a href="{{ route('all.product') }}"><i data-feather="box"></i><span>Produk</span></a></li>
                        <li><a href="{{ route('add.product') }}"><i data-feather="plus-square"></i><span>Buat Produk Baru</span></a></li>
                        <li><a href="{{ route('all.category') }}"><i data-feather="codepen"></i><span>Kategori</span></a></li>
                        <li><a href="sales-list.html"><i data-feather="package"></i><span>Penjualan</span></a></li>
                        <li><a href="manage-stocks.html"><i data-feather="package"></i><span>Kelola Stok</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Pengguna</h6>
                    <ul>
                        <li><a href="customers.html"><i data-feather="user"></i><span>Pelanggan</span></a></li>
                        <li><a href="suppliers.html"><i data-feather="users"></i><span>Suplier</span></a></li>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">SDM</h6>
                    <ul>
                        <li><a href="employees-grid.html"><i data-feather="user"></i><span>Pegawai</span></a></li>
                        <li><a href="attendance-admin.html"><i data-feather="user"></i><span>Kehadiran</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Pengelolah Pengguna</h6>
                    <ul>
                        <li><a href="users.html"><i data-feather="user-check"></i><span>Admin</span></a></li>
                        <li class="submenu">
                            <a href="roles-permissions.html"><i data-feather="shield"></i><span>Peran dan Akses</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="roles-permissions.html">Peran</a></li>
                                <li><a href="permision.html">Akses</a></li>
                                <li><a href="all-roles-permision.html">Akses Peran</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Laporan</h6>
                    <ul>
                        <li><a href="#"><i data-feather="pie-chart"></i><span>Laporan Penjualan</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Settings</h6>
                    <ul>

                        <li>
                            <a href="{{ route('admin.logout') }}"><i data-feather="log-out"></i><span>Keluar</span> </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>