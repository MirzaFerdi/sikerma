<!-- resources/views/layouts/navbar.blade.php -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                @if ($totalKadaluarsa > 0)
                    <span class="badge badge-warning navbar-badge">{{ $totalKadaluarsa }}</span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @if ($totalKadaluarsa > 0)
                    <span class="dropdown-item dropdown-header">{{ $totalKadaluarsa }} Dokumen Kadaluarsa</span>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('arsip.index') }}" class="dropdown-item">
                        <i class="fas fa-file-alt mr-2"></i> Lihat dokumen kadaluarsa
                    </a>
                @else
                    <span class="dropdown-item dropdown-header">Tidak ada dokumen kadaluarsa</span>
                @endif
            </div>

        </li>
    </ul>
</nav>
