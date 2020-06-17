<div class="nk-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a href="{{ url('/home') }}" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Home</span>
                </a>
            </li>
            
            <li class="nav-label mt-3">Mangement</li>
            <li>
                <a href="{{ route('pengurus.penerima.index') }}" aria-expanded="false">
                    <i class="icon-envelope menu-icon"></i> <span class="nav-text">Penerima</span>
                </a>
            </li> 
            <li>
                <a href="{{ route('pengurus.donatur.index') }}" aria-expanded="false">
                    <i class="icon-envelope menu-icon"></i> <span class="nav-text">Donatur</span>
                </a>
            </li> 
            <li>
                <a href="{{ route('pengurus.donasi.index') }}" aria-expanded="false">
                    <i class="icon-envelope menu-icon"></i> <span class="nav-text">Donasi</span>
                </a>
            </li> 
            <li>
                <a href="{{ route('pengurus.category.index') }}" aria-expanded="false">
                    <i class="icon-envelope menu-icon"></i> <span class="nav-text">Kategori</span>
                </a>
            </li>                    

            <li class="nav-label mt-3">Public</li>
            <li>
                <a href="{{ route('pengurus.layanan_public.index') }}" aria-expanded="false">
                    <i class="icon-envelope menu-icon"></i> <span class="nav-text">Layanan</span>
                </a>
            </li>                   
        </ul>
    </div>
</div>