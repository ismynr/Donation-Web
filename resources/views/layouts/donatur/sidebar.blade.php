<div class="nk-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a href="{{ url('/home') }}" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Home</span>
                </a>
            </li>
            
            <li class="nav-label mt-3">Data</li>
            <li>
                <a href="{{ route('donatur.donasi.index') }}" aria-expanded="false">
                    <i class="icon-envelope menu-icon"></i> <span class="nav-text">Donasi Anda</span>
                </a>
            </li>                

            <li class="nav-label mt-3">Public</li>
            <li>
                <a href="{{ route('donatur.layanan_public.index') }}" aria-expanded="false">
                    <i class="icon-envelope menu-icon"></i> <span class="nav-text">Layanan</span>
                </a>
            </li>                   
        </ul>
    </div>
</div>