<!-- BEGIN HEADER-->
<header id="header">
    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand">
                    <div class="brand-holder">
                        <a href="{{url('')}}">
                            <span class="text-lg text-bold text-primary">{{ config('website.name') }}</span>
                        </a>
                    </div>
                </li>
                <li>
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">
            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                        <img src="{{ user_avatar(50) }}" alt=""/>
                        <span class="profile-info">
                            {{ auth()->user()->username }}
                            <small>{{ display(auth()->user()->roles->pluck('name')->implode(', '), 'None') }}</small>
                        </span>
                    </a>
                    <ul class="dropdown-menu animation-dock">
                        <li class="dropdown-header">Config</li>
                        <li>
                            <a href="#">
                                <i class="fa fa-fw fa-circle-o-notch"></i>
                                My profile
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/logout')}}">
                                <i class="fa fa-fw fa-power-off text-danger"></i>
                                Logout
                            </a>
                        </li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
            </ul><!--end .header-nav-profile -->
        </div><!--end #header-navbar-collapse -->
    </div>
</header>
<!-- END HEADER-->