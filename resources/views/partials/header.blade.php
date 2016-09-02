<!-- BEGIN HEADER-->
<header id="header">
    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand">
                    <div class="brand-holder">
                        <a href="{{route('admin.dashboard')}}">
                            <span class="text-lg text-bold text-primary">ACCESSWORLD CONTROL</span>
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
            <ul class="header-nav header-nav-options">
                @include('common.countries')
                <li>
                    <!-- Search form -->
                    <form class="navbar-search" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" name="headerSearch"
                                   placeholder="Enter your keyword">
                        </div>
                        <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i>
                        </button>
                    </form>
                </li>
            </ul><!--end .header-nav-options -->
            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                        <img src="{{\Auth::user()->image->thumbnail(140,140)}}" alt=""/>
                        <span class="profile-info">
                            {{\Auth::user()->username}}
                            <small>{{\Auth::user()->roles->pluck('name')->implode(', ')}}</small>
                        </span>
                    </a>
                    <ul class="dropdown-menu animation-dock">
                        <li class="dropdown-header">Config</li>
                        <li><a href="{{route('admin.user.show', \Auth::user()->slug)}}"><i
                                        class="fa fa-fw fa-circle-o-notch"></i> My profile</a></li>
                        <li><a href="{{url('/logout')}}"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a>
                        </li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
            </ul><!--end .header-nav-profile -->
            <!-- <ul class="header-nav header-nav-toggle">
              <li>
                <a class="btn btn-icon-toggle btn-default" href="#offcanvas-search" data-toggle="offcanvas" data-backdrop="false">
                  <i class="fa fa-ellipsis-v"></i>
                </a>
              </li>
            </ul> --><!--end .header-nav-toggle -->
        </div><!--end #header-navbar-collapse -->
    </div>
</header>
<!-- END HEADER-->