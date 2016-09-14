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
                <a href="{{ url('') }}">
                    <div class="gui-icon">
                        <i class="md md-home"></i>
                    </div>
                    <span class="title">Home</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END DASHBOARD -->

            <!-- BEGIN ORDER -->
            <li class="gui-folder">
                <a href="{{ route('order.index') }}">
                    <div class="gui-icon">
                        <i class="md md-markunread-mailbox"></i>
                    </div>
                    <span class="title">Orders</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('order.vps.index') }}">
                            <span class="title">VPS</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('order.web.index') }}">
                            <span class="title">Web</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('order.email.index') }}">
                            <span class="title">Email</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- END ORDER -->

            <!-- BEGIN Provision -->
            <li class="gui-folder">
                <a href="javascript:void(0);">
                    <div class="gui-icon">
                        <i class="md md-face-unlock"></i>
                    </div>
                    <span class="title">Provision</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('provision.vps.index') }}">
                            <span class="title">VPS</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="title">Web</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="title">Email</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- END Provision -->

            <!-- BEGIN CUSTOMER -->
            <li>
                <a href="{{ route('customer.index') }}">
                    <div class="gui-icon">
                        <i class="md md-people"></i>
                    </div>
                    <span class="title">Customers</span>
                </a>
            </li>
            <!-- END CUSTOMER -->

            <!-- BEGIN USERS -->
            <li class="gui-folder">
                <a href="javascript:void(0);">
                    <div class="gui-icon">
                        <i class="md md-face-unlock"></i>
                    </div>
                    <span class="title">Users</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('user.index') }}">
                            <span class="title">List</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.create') }}">
                            <span class="title">Create</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('role.index') }}">
                            <span class="title">Role</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- END USERS -->

            <!-- BEGIN STAFF -->
            <li>
                <a href="{{ route('staff.index') }}">
                    <div class="gui-icon">
                        <i class="md md-assignment-ind"></i>
                    </div>
                    <span class="title">Staffs</span>
                </a>
            </li>
            <!-- END STAFF -->

            <!-- BEGIN SERVICES -->
            <li>
                <a href="{{ route('service.index') }}">
                    <div class="gui-icon">
                        <i class="md md-layers"></i>
                    </div>
                    <span class="title">Services</span>
                </a>
            </li>
            <!-- END SERVICES -->

            <!-- BEGIN TESTIMONIALS -->
            <li>
                <a href="{{ route('testimonial.index') }}">
                    <div class="gui-icon">
                        <i class="md md-message"></i>
                    </div>
                    <span class="title">Testimonials</span>
                </a>
            </li>
            <!-- END TESTIMONIALS -->

            <!-- BEGIN CERTIFICATE -->
            <li>
                <a href="{{ route('certificate.index') }}">
                    <div class="gui-icon">
                        <i class="md md-verified-user"></i>
                    </div>
                    <span class="title">Certificates</span>
                </a>
            </li>
            <!-- END CERTIFICATE -->

            <!-- BEGIN CLIENT -->
            <li>
                <a href="{{ route('client.index') }}">
                    <div class="gui-icon">
                        <i class="md md-people-outline"></i>
                    </div>
                    <span class="title">Clients</span>
                </a>
            </li>
            <!-- END CLIENT -->

            <!-- BEGIN PACKAGE -->
            <li class="gui-folder">
                <a href="javascript:void(0);">
                    <div class="gui-icon">
                        <i class="md md-wallet-giftcard"></i>
                    </div>
                    <span class="title">Packages</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('vpsPackage.index') }}">
                            <span class="title">Vps</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('webPackage.index') }}">
                            <span class="title">Web</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('emailPackage.index') }}">
                            <span class="title">Email</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- END PACKAGE -->

            <!-- BEGIN DATACENTER -->
            <li>
                <a href="{{ route('dataCenter.index') }}">
                    <div class="gui-icon">
                        <i class="md md-place"></i>
                    </div>
                    <span class="title">Data Centers</span>
                </a>
            </li>
            <!-- END DATA CENTER -->

            <!-- BEGIN OPERATING SYSTEM -->
            <li>
                <a href="{{ route('operatingSystem.index') }}">
                    <div class="gui-icon">
                        <i class="md md-computer"></i>
                    </div>
                    <span class="title">Operating Systems</span>
                </a>
            </li>
            <!-- END OPERATING SYSTEM -->

            <!-- BEGIN PAGES -->
            <li>
                <a href="{{ route('page.index') }}">
                    <div class="gui-icon">
                        <i class="md md-pages"></i>
                    </div>
                    <span class="title">Pages</span>
                </a>
            </li>
            <!-- END PAGES -->

            <!-- BEGIN MENU -->
            <li>
                <a href="{{ route('menu.index') }}">
                    <div class="gui-icon">
                        <i class="md md-list"></i>
                    </div>
                    <span class="title">Menu</span>
                </a>
            </li>
            <!-- END MENU -->

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
