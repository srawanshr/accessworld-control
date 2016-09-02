<!-- BEGIN MENUBAR-->
<div id="menubar" class="menubar-inverse ">
    <div class="menubar-fixed-panel">
        <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                <i class="fa fa-bars"></i>
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

            <!-- BEGIN DASHBOARD -->
            <li>
                <a href="{{ url('') }}" >
                    <div class="gui-icon"><i class="md md-home"></i></div>
                    <span class="title">Home</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END DASHBOARD -->

        </ul><!--end .main-menu -->
        <!-- END MAIN MENU -->
        <div class="menubar-foot-panel">
            <small class="no-linebreak hidden-folded">
                <span class="opacity-75">Copyright &copy; 2016</span> <strong><a href="https://www.accessworld.net">AccessWorld</a></strong>
            </small>
        </div>
    </div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->
<!-- END MENUBAR -->
