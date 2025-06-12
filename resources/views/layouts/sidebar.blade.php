<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('dashboard') }}" class="brand-link py-2"
        style="display: flex; align-items: center; justify-content: center; flex-direction: column;">
        <div style="display: flex; align-items: center; margin-bottom: 8px;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8; width: 40px; height: 40px; margin-right: 10px;">
            <span class="brand-text font-weight-bold"
                style="font-size: 16px; line-height: 1.2; text-align: center;">Sistem Informasi<br>Data Kerja
                Sama</span>
        </div>
    </a>
    <div class="sidebar pt-2 ">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if (auth()->user()->role == 'koordinator')
                    <li class="nav-item">
                        <a href="{{ route('dudi.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Daftar Dudi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('mou.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-handshake"></i>
                            <p>Daftar MoU</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('ia-pks.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Daftar IA dan PKS</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-archive"></i>
                            <p>Arsip Dokumen</p>
                        </a>
                    </li>
                @elseif(auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('dudi.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>Validasi Dudi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-signature"></i>
                            <p>Dokumen MoU</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Dokumen IA dan PKS</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
