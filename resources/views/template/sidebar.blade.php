<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link" style="text-align: center;">
        <span class="brand-text font-weight-bold">Si</span>Odat
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('pp2.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/" class="nav-link {{ Request::is('home')? 'active':''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/penjualan" class="nav-link {{ Request::is('penjualan*') || Request::is('input-penjualan') ? 'active':''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Penjualan
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="/pengeluaran" class="nav-link {{ Request::is('pengeluaran*') || Request::is('input-pengeluaran') ? 'active':''}}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Pengeluaran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/keuntungan" class="nav-link {{ Request::is('keuntungan*')? 'active':''}}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Keuntungan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/logout" class="nav-link">Log Out</a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>