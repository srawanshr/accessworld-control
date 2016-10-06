<!-- BEGIN MENUBAR-->
<div id="menubar" class="menubar-inverse ">
    <div class="menubar-fixed-panel">
        <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                <i class="md md-menu"></i>
            </a>
        </div>
        <div class="expanded">
            <a href="{{ url('') }}">
                <span class="text-lg text-bold text-primary ">{{ config('website.name') }}</span>
            </a>
        </div>
    </div>
    <div class="menubar-scroll-panel">
        <!-- BEGIN MAIN MENU -->
        <ul id="main-menu" class="gui-controls">
            <li>
                <form class="navbar-search expanded" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control search" placeholder="Enter your keyword">
                    </div>
                    <button type="button" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                </form>
            </li>
            @foreach($allMenu as $menu)
                <li class="menu {{ $menu['class'] ?: '' }}">
                    <a href="{{ $menu['route'] }}">
                        @if(isset($menu['icon']))
                            <div class="gui-icon">
                                <i class="{{ $menu['icon'] }}"></i>
                            </div>
                        @else
                            <div class="gui-icon gui-text">
                                {{ $menu['text'] }}
                            </div>
                        @endif
                        <span class="title">{{ $menu['title'] }}</span>
                    </a>
                    @if(isset($menu['items']))
                        <ul>
                            @foreach($menu['items'] as $item)
                                <li class="sub-menu">
                                    <a href="{{ $item['route'] }}">
                                        <span class="title sub">{{ $item['title'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach

        </ul><!--end .main-menu -->
        <!-- END MAIN MENU -->
        <div class="menubar-foot-panel">
            <small class="no-linebreak hidden-folded">
                <span class="opacity-75">Copyright &copy; 2016</span>
                <strong>
                    <a href="{{ config('website.url') }}">{{ config('website.title') }}</a>
                </strong>
            </small>
        </div>
    </div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->
<!-- END MENUBAR -->
