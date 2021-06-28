<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{url('admin')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/data_donatur')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Donatur
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-donate"></i>
                        <p>
                            Donasi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('donasi')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Donasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('donasi/create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Donasi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Yayasan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('yayasan')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Yayasan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('yayasan/create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Yayasan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-video"></i>
                        <p>
                            Video
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('video.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Video</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('video.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Video</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Artikel
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('artikel.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Artikel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('artikel.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Artikel</p>
                            </a>
                        </li>
                    </ul>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>