<div class="header">    
    <div class="header-content clearfix">                
        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">
            <div class="input-group icons">
                <div class="input-group-prepend">
                    <a href="{{ url('/') }}" title="home"><span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3 mt-1" id="basic-addon1"><i class="icon-home menu-icon"></i></span></a>
                    <span class="label gradient-3 btn-rounded mt-2">{{ Auth::user()->role }}</span>
                </div>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                        <span style="font-size: 13px" class="mr-1">{{ Auth::user()->name }}</span>
                        <span class="activity active"></span>
                        <img src="{{ asset('quixlab') }}/images/user/form-user.png" height="40" width="40" alt="">
                    </div>
                    <div class="drop-down dropdown-profile   dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="{{ route('donatur.profile.index') }}"><i class="icon-user"></i> <span>Profile</span></a>
                                </li>
                                <hr class="my-2">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-key"></i> 
                                        <span>{{ __('Logout') }}</span>
                                    </a>
                                </li>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>