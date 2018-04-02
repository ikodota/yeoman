@extends('yeoman::layouts.backend.gentelella.master')

@section('body_class')
nav-md
@endsection

@section('body')

        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Admin Backend</span></a>
                        </div>

                        <div class="clearfix"></div>


                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3>SYSTEM</h3>
                                <ul class="nav side-menu">
                                    @yield('side_menu')
                                </ul>
                            </div>
                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav class="" role="navigation">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="/img/admin/avatar-demo.jpg" alt="">@if(Auth::guard('admin')->user()) {{Auth::guard('admin')->user()->name}} @endif
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="javascript:;"> Profile</a></li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="badge bg-red pull-right">50%</span>
                                                <span>Settings</span>
                                            </a>
                                        </li>
                                        <li><a href="javascript:;">Help</a></li>
                                        <li><a href="#" onclick="logout()"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                        <form id="logoutForm" action="/admin/logout" method="post">
                                            <input type="hidden" name="_method" value="post">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        </form>
                                        <script>
                                            function logout() {
                                                $('#logoutForm').submit();
                                            }

                                        </script>
                                    </ul>
                                </li>

                                <li role="presentation" class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="badge bg-green">6</span>
                                    </a>
                                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                        <li>
                                            <a>
                                                <span class="image"><img src="/img/admin/avatar-demo.jpg" alt="Profile Image" /></span>
                            <span>
                              <span>John Smith</span>
                              <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                              Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="/img/admin/avatar-demo.jpg" alt="Profile Image" /></span>
                            <span>
                              <span>John Smith</span>
                              <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                              Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="/img/admin/avatar-demo.jpg" alt="Profile Image" /></span>
                            <span>
                              <span>John Smith</span>
                              <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                              Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="/img/admin/avatar-demo.jpg" alt="Profile Image" /></span>
                            <span>
                              <span>John Smith</span>
                              <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                              Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="text-center">
                                                <a>
                                                    <strong>See All Alerts</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">

                    <div class="clearfix"></div>
                    <section class="content-header">
                        @yield('content_header')
                    </section>
                    <br>
                    @yield('content')
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

    @yield('body_dialog');
    <style type="text/css" >
        .content-header {
            padding: 15px 15px 0;
            position: relative;
        }
        .content-header > h1 {
            font-size: 24px;
            margin: 0;
        }
        .content-header > h1 > small {
            display: inline-block;
            font-size: 15px;
            font-weight: 300;
            padding-left: 4px;
        }
        .content-header > .breadcrumb {
            background: transparent none repeat scroll 0 0;
            border-radius: 2px;
            float: right;
            font-size: 12px;
            margin-bottom: 0;
            margin-top: 0;
            padding: 7px 5px;
            position: absolute;
            right: 10px;
            top: 15px;
        }
        .content-header > .breadcrumb > li > a {
            color: #444;
            display: inline-block;
            text-decoration: none;
        }
        .content-header > .breadcrumb > li > a > .fa, .content-header > .breadcrumb > li > a > .glyphicon, .content-header > .breadcrumb > li > a > .ion {
            margin-right: 5px;
        }
        .content-header > .breadcrumb > li + li::before {
            content: "> ";
        }
        @media (max-width: 991px) {
            .content-header > .breadcrumb {
                background: #d2d6de none repeat scroll 0 0;
                float: none;
                margin-top: 5px;
                padding-left: 10px;
                position: relative;
                right: 0;
                top: 0;
            }
            .content-header > .breadcrumb li::before {
                color: #97a0b3;
            }
        }
    </style>
    @yield('script')

    <script src="{{ asset('theme/gentelella/build/js/custom.js') }}"></script>
    <script>
        //定位后台菜单
        $('.side-menu a.active').parent().parent().css('display','block');
        $('.side-menu a.active').parent().parent().parent().addClass('active');
    </script>


@stop

