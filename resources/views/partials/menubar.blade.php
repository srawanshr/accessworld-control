<!-- BEGIN MENUBAR-->
<div id="menubar" class="menubar-inverse ">
    <div class="menubar-fixed-panel">
        <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="expanded">
            <a href="{{ route('admin.dashboard') }}">
                <span class="text-lg text-bold text-primary ">AccesWorld Control Panel</span>
            </a>
        </div>
    </div>
    <div class="menubar-scroll-panel">
        <!-- BEGIN MAIN MENU -->
        <ul id="main-menu" class="gui-controls">

            <!-- BEGIN DASHBOARD -->
            <li>
                <a href="{{ route('admin.dashboard') }}" >
                    <div class="gui-icon"><i class="md md-home"></i></div>
                    <span class="title">Dashboard</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END DASHBOARD -->

            @permission('read.user')
            <!-- BEGIN Users -->
            <li class="gui-folder">
                <a href="javascript:void(0);">
                    <div class="gui-icon"><i class="md md-face-unlock"></i></div>
                    <span class="title">Users</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">AWT</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.user.index') }}" ><span class="title">List</span></a></li>
                            @permission('create.user')
                            <li><a href="{{ route('admin.user.create') }}" ><span class="title">Create</span></a></li>
                            @endpermission
                            @role('super')
                            <li><a href="{{ route('admin.role.index') }}" ><span class="title">Roles</span></a></li>
                            @endrole
                        </ul>
                    </li>
                    @permission('read.customer')
                            <!-- BEGIN Customers -->
                    <li>
                        <a href="{{ route('admin.customer.index') }}" >
                            <span class="title">Customers</span>
                        </a>
                    </li><!--end /menu-li -->
                    <!-- END Customers -->
                    @endpermission
                </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END Users -->
            @endpermission

            @permission('read.staff')
            <!-- BEGIN Users -->
            <li class="gui-folder">
                <a href="javascript:void(0);">
                    <div class="gui-icon"><i class="md md-assignment-ind"></i></div>
                    <span class="title">Staffs</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li><a href="{{ route('admin.staff.index') }}" ><span class="title">List</span></a></li>
                    @permission('create.staff')
                    <li><a href="{{ route('admin.staff.create') }}" ><span class="title">Create</span></a></li>
                    @endpermission
                </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END Users -->
            @endpermission

            @permission('read.order')
            <!-- BEGIN Order -->
            <li class="gui-folder">
                <a href="javascript:void(0);">
                    <div class="gui-icon"><i class="md md-markunread-mailbox"></i></div>
                    <span class="title">Orders</span>
                </a>
                <ul>
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">New</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.vpsorder.index') }}">VPS</a></li>
                            <li><a href="{{ route('admin.weborder.index') }}">Web</a></li>
                            <li><a href="{{ route('admin.emailorder.index') }}">Email</a></li>
                            <li><a href="{{ route('admin.sslorder.index') }}">SSL</a></li>
                        </ul>
                    </li>
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Renewals</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.vpsrenewal.index') }}">VPS</a></li>
                            <li><a href="{{ route('admin.webrenewal.index') }}">Web</a></li>
                            <li><a href="{{ route('admin.emailrenewal.index') }}">Email</a></li>
                        </ul>
                    </li>
                </ul>
            </li><!--end /menu-li -->
            <!-- END Order -->
            @endpermission

            @permission('read.provision')
            <!-- BEGIN Provision -->
            <li class="gui-folder">
                <a href="javascript:void(0);">
                    <div class="gui-icon"><i class="md md-domain"></i></div>
                    <span class="title">Provisions</span>
                </a>
                <ul>
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Running</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.vpsprovision.index') }}">VPS</a></li>
                            <li><a href="{{ route('admin.webprovision.index') }}">Web</a></li>
                            <li><a href="{{ route('admin.emailprovision.index') }}">Email</a></li>
                        </ul>
                    </li>
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Expired</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.vps.expired.index') }}">VPS</a></li>
                            <li><a href="{{ route('admin.web.expired.index') }}">Web</a></li>
                            <li><a href="{{ route('admin.email.expired.index') }}">Mail</a></li>
                        </ul>
                    </li>
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Suspended</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.vps.suspended.index') }}">VPS</a></li>
                            <li><a href="{{ route('admin.web.suspended.index') }}">Web</a></li>
                            <li><a href="{{ route('admin.email.suspended.index') }}">Mail</a></li>
                        </ul>
                    </li>
                </ul>
            </li><!--end /menu-li -->
            <!-- END Provision -->
            @endpermission

            @permission('read.ip')
            <!-- BEGIN IPs -->
            <li class="gui-folder">
                <a href="javascript:void(0);">
                    <div class="gui-icon"><i class="fa fa-fw fa-server"></i></div>
                    <span class="title">IPs</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li><a href="{{ route('admin.ip.index') }}" ><span class="title">List</span></a></li>
                    @permission('create.ip')
                        <li><a href="{{route('admin.ip.create')}}" ><span class="title">Create</span></a></li>
                        <!-- BEGIN DHCP -->
                        <li class="gui-folder">
                            <a href="javascript:void(0);">
                                <span class="title">DHCP</span>
                            </a>
                            <!--start submenu -->
                            <ul>
                                <li><a href="{{route('admin.dhcpmap.index')}}" ><span class="title">List</span></a></li>
                                <li><a href="{{route('admin.dhcpmap.create')}}" ><span class="title">Create</span></a></li>
                            </ul><!--end /submenu -->
                        </li><!--end /menu-li -->
                        <!-- END DHCP -->
                    @endpermission
                    @permission('read.subnet')
                    <!-- BEGIN Subnets -->
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Subnets</span>
                        </a>
                        <!--start submenu -->
                        <ul>
                            <li><a href="{{ route('admin.subnet.index') }}" ><span class="title">List</span></a></li>
                            @permission('create.subnet')
                            <li><a href="{{ route('admin.subnet.create') }}" ><span class="title">Create</span></a></li>
                            @endpermission
                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->
                    <!-- END Subnets -->
                    @endpermission
                </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END IPs -->
            @endpermission

            @permission('read.os')
            <!-- BEGIN Operating Systems -->
            <li class="gui-folder">
                <a href="javascript:void(0);">
                    <div class="gui-icon"><i class="fa fa-windows"></i></div>
                    <span class="title">Operating Systems</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li><a href="{{ route('admin.operatingsystem.index') }}" ><span class="title">List</span></a></li>
                    @permission('create.os')
                    <li><a href="{{ route('admin.operatingsystem.create') }}" ><span class="title">Create</span></a></li>
                    @endpermission
                </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END Operating Systems -->
            @endpermission

            @permission('read.os')
            <!-- BEGIN Data Center -->
            <li class="gui-folder">
                <a href="javascript:void(0);">
                    <div class="gui-icon"><i class="fa fa-building"></i></div>
                    <span class="title">Data Centers</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li><a href="{{ route('admin.datacenter.index') }}" ><span class="title">List</span></a></li>
                    @permission('create.os')
                    <li><a href="{{ route('admin.datacenter.create') }}" ><span class="title">Create</span></a></li>
                    @endpermission
                </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END Data Center -->
            @endpermission

            @permission('read.internalvps')
            <!-- BEGIN Data Center -->
            <li class="gui-folder">
                <a href="javascript:void(0);">
                    <div class="gui-icon">
                        <i class="md md-laptop-chromebook"></i>
                    </div>
                    <span class="title">Manual Provision</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Internal VPS</span>
                        </a>
                        <!--start submenu -->
                        <ul>
                            <li>
                                <a href="{{ route('admin.internalvps.index') }}">
                                    <span class="title">List</span>
                                </a>
                            </li>
                            @permission('create.os')
                            <li>
                                <a href="{{ route('admin.internalvps.create') }}">
                                    <span class="title">Create</span>
                                </a>
                            </li>
                            @endpermission
                        </ul><!--end /submenu -->
                    </li>
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Test VPS</span>
                        </a>
                        <!--start submenu -->
                        <ul>
                            <li>
                                <a href="{{ route('admin.testvps.index') }}">
                                    <span class="title">List</span>
                                </a>
                            </li>
                            @permission('create.os')
                            <li>
                                <a href="{{ route('admin.testvps.create') }}">
                                    <span class="title">Create</span>
                                </a>
                            </li>
                            @endpermission
                        </ul><!--end /submenu -->
                    </li>
                </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END Data Center -->
            @endpermission

            @permission('read.currency')
            <!-- BEGIN Currencies -->
            <li>
                <a href="{{ route('admin.currency.index') }}" >
                    <div class="gui-icon"><i class="fa fa-money"></i></div>
                    <span class="title">Currencies</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END Currencies -->
            @endpermission

            @permission('read.referral')
            <!-- BEGIN Currencies -->
            <li>
                <a href="{{ route('admin.referral.index') }}" >
                    <div class="gui-icon"><i class="fa fa-paper-plane-o"></i></div>
                    <span class="title">Refers</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END Currencies -->
            @endpermission

            @permission('read.cms')
            <!-- BEGIN CMS -->
            <li class="gui-folder">
                <a href="javascript:void(0);">
                    <div class="gui-icon"><i class="md md-web"></i></div>
                    <span class="title">CMS</span>
                </a>
                <ul>
                    <!-- BEGIN Services -->
                    <li class="gui-folder">
                        <a href="javascript:void(0);" >
                            <span class="title">Services</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.service.index') }}"><span class="title">List</span></a></li>
                            <li><a href="{{ route('admin.featuredpackage.index') }}"><span class="title">Featured Packages</span></a></li>
                            <!--BEGIN Vps -->
                            <li class="gui-folder">
                                <a href="javascript:void(0);">
                                    <span class="title">VPS</span>
                                </a>
                                <ul>
                                    <li><a href="{{ route('admin.vpscomponent.index') }}" ><span class="title">Components</span></a></li>
                                    @permission('read.package')
                                    <li>
                                        <a href="{{ route('admin.vpspackage.index') }}">
                                            <span class="title">Packages</span>
                                        </a>
                                    </li>
                                    @endpermission
                                </ul>
                            </li>
                            <!-- END Vps -->

                            <!--BEGIN Web -->
                            <li class="gui-folder">
                                <a href="javascript:void(0);">
                                    <span class="title">Web</span>
                                </a>
                                <ul>
                                    <li><a href="{{ route('admin.webcomponent.index') }}" ><span class="title">Components</span></a></li>
                                    @permission('read.package')
                                    <li>
                                        <a href="{{ route('admin.webpackage.index') }}">
                                            <span class="title">Packages</span>
                                        </a>
                                    </li>
                                    @endpermission
                                </ul>
                            </li>
                            <!-- END Web -->

                            <!--BEGIN Email -->
                            <li class="gui-folder">
                                <a href="javascript:void(0);">
                                    <span class="title">Email</span>
                                </a>
                                <ul>
                                    <li><a href="{{ route('admin.emailcomponent.index') }}" ><span class="title">Components</span></a></li>
                                    @permission('read.package')
                                    <li>
                                        <a href="{{ route('admin.emailpackage.index') }}">
                                            <span class="title">Packages</span>
                                        </a>
                                    </li>
                                    @endpermission
                                </ul>
                            </li>
                            <!-- END Email -->
                        </ul>
                    </li>
                    <!-- END Services -->

                    <!--BEGIN Pages -->
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Pages</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.homepage.index') }}" ><span class="title">Home</span></a></li>
                            <li><a href="{{ route('admin.servicepage.index') }}" ><span class="title">Service</span></a></li>
                            <li><a href="{{ route('admin.aboutpage.index') }}" ><span class="title">About</span></a></li>
                            <li><a href="{{ route('admin.contactpage.index') }}" ><span class="title">Contact</span></a></li>
                            <li><a href="{{ route('admin.slider.index') }}"><span class="title">Home Slider</span></a></li>
                        </ul>
                    </li>
                    <!--END Pages-->
                    
                    <!-- BEGIN Sub Pages -->
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Sub Pages</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.subpage.index') }}" ><span class="title">List</span></a></li>
                            @permission('create.cms')
                            <li><a href="{{ route('admin.subpage.create') }}" ><span class="title">Create</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    <!-- END Sub Pages -->
                    
                    <!-- BEGIN Features -->
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Features</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.feature.index') }}" ><span class="title">List</span></a></li>
                            @permission('create.cms')
                            <li><a href="{{ route('admin.feature.create') }}" ><span class="title">Create</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    <!-- END Features -->

                    <!-- BEGIN Events -->
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Events</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.event.index') }}" ><span class="title">List</span></a></li>
                            @permission('create.cms')
                            <li><a href="{{ route('admin.event.create') }}" ><span class="title">Create</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    <!-- END Events -->

                    <!-- BEGIN Offers -->
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Offers</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.offer.index') }}" ><span class="title">List</span></a></li>
                            @permission('create.cms')
                            <li><a href="{{ route('admin.offer.create') }}" ><span class="title">Create</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    <!-- END Offers -->
                    
                    <!-- BEGIN Clients -->
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Clients</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.client.index') }}" ><span class="title">List</span></a></li>
                            @permission('create.cms')
                            <li><a href="{{ route('admin.client.create') }}" ><span class="title">Create</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    <!-- END Clients -->

                    <!-- BEGIN Testimonials -->
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Testimonials</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.testimonial.index') }}" ><span class="title">List</span></a></li>
                            @permission('create.cms')
                            <li><a href="{{ route('admin.testimonial.create') }}" ><span class="title">Create</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    <!-- END Testimonials -->

                    <!-- BEGIN Certificates -->
                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">Certificates</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.certificate.index') }}" ><span class="title">List</span></a></li>
                            @permission('create.cms')
                            <li><a href="{{ route('admin.certificate.create') }}" ><span class="title">Create</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    <!-- END Certificates -->

                     <!-- BEGIN Misc -->
                    <li><a href="{{ route('admin.misc.index') }}">
                            <span class="title">Miscellaneous</span>
                        </a>
                    </li>
                    <!-- END Misc -->

                </ul>
            </li>
            <!-- END CMS -->
            @endpermission

            {{--@permission('read.provision')--}}
            {{--<!-- BEGIN VPS STATS -->--}}
            {{--<li>--}}
                {{--<a href="{{ route('admin.vps.stat') }}" >--}}
                    {{--<div class="gui-icon"><i class="fa fa-paper-plane-o"></i></div>--}}
                    {{--<span class="title">VPS BandWidth</span>--}}
                {{--</a>--}}
            {{--</li><!--end /menu-li -->--}}
            {{--<!-- END VPS STATS -->--}}
            {{--@endpermission--}}

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
