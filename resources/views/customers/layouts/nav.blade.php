<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container">
        <h1 class="navbar-brand d-flex align-items-center fw-semi-bold fs-3" href="index.html" style="color: black;">
            DEVRENTAL</h1>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
                <li class="nav-item px-2" data-anchor="data-anchor">
                    <a class="nav-link fw-medium active" aria-current="page" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item px-2" data-anchor="data-anchor">
                    <a class="nav-link" href="/customer/carlist">Daftar Mobil</a>
                </li>
                <li class="nav-item px-2" data-anchor="data-anchor">
                    <a class="nav-link" href="#footer">Kontak</a>
                </li>
                <li class="nav-item px-2" data-anchor="data-anchor">
                    <a class="nav-link" href="/customer/booking/history">Riwayat Sewa</a>
                </li>
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="nav-profile-img">
                            <span class="availability-status online"></span>
                        </div>
                     
                            <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
                        
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout me-2 text-primary"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                

            </ul>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
