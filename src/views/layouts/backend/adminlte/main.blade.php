@extends('yeoman::layouts.backend.adminlte.master')

@section('body_class')
    hold-transition skin-blue sidebar-mini
@endsection

@section('body')
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>LTE</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                                page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-red"></i> 5 new members joined
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-red"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('theme/adminlte/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                                <span class="hidden-xs">Alexander Pierce</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ asset('theme/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                                    <p>
                                        Alexander Pierce - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" onclick="logout()" class="btn btn-default btn-flat">Sign out</a>
                                        <form id="logoutForm" action="/admin/logout" method="post">
                                            <input type="hidden" name="_method" value="post">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        </form>
                                        <script>
                                            function logout() {
                                                $('#logoutForm').submit();
                                            }

                                        </script>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar" id="sidebar-menu">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('theme/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Alexander Pierce</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <div class="navbar-custom-menu">
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    @yield('side_menu')

                    <li class="header">ABOUT</li>
                    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
                </ul>
                </div>

            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-tabs">
                <button class="roll-nav roll-left tabLeft">
                    <i class="fa fa-backward"></i>
                </button>
                <nav class="page-tabs menuTabs">
                    <div class="page-tabs-content" style="margin-left: 0px;">
                        <a href="javascript:;" class="active menuTab" data-id="/admin/dashboard">欢迎首页</a>
                    </div>
                </nav>
                <button class="roll-nav roll-right tabRight">
                    <i class="fa fa-forward" style="margin-left: 3px;"></i>
                </button>
                <div class="btn-group roll-nav roll-right">
                    <button class="dropdown tabClose" data-toggle="dropdown">
                        标签操作<i class="fa fa-caret-down" style="padding-left: 3px;"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a class="tabReload" href="javascript:void(0);">刷新当前</a></li>
                        <li><a class="tabCloseCurrent" href="javascript:void(0);">关闭当前</a></li>
                        <li><a class="tabCloseAll" href="javascript:void(0);">全部关闭</a></li>
                        <li><a class="tabCloseOther" href="javascript:void(0);">关闭其他标签</a></li>
                    </ul>
                </div>
                <button class="roll-nav roll-right fullscreen"><i class="fa fa-arrows-alt"></i></button>
            </div>
            <div class="content-iframe" style="overflow: hidden;">
                <div id="content-main" class="mainContent"  style="overflow:hidden " >
                    <iframe class="LRADMS_iframe" id="iframe2" name="iframe2" src="/admin/dashboard" data-id="2" seamless="" style="display: inline;" width="100%" height="100%" frameborder="0"></iframe>
                </div>

            </div>


        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.3.7
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>

    @yield('body_dialog');
    @yield('style')
    <style>
        .content-wrapper .content-tabs {
            background: #fafafa none repeat scroll 0 0;
            border-bottom: 2px solid #222d32;
            font-size: 12px;
            height: 41px;
            line-height: 39.5px;
            position: relative;
        }
        .content-wrapper .content-tabs .roll-left {
            border-right: 1px solid #ddd;
            left: 0;
        }
        .content-wrapper .content-tabs .roll-right.tabRight {
            right: 120px;
        }
        .content-wrapper .content-tabs .roll-right {
            border-left: 1px solid #ddd;
            right: 0;
        }
        .content-wrapper .content-tabs .roll-right.btn-group {
            padding: 0;
            right: 40px;
            width: 80px;
        }

        .content-wrapper .content-tabs .roll-right.btn-group button {
            width: 80px;
        }
        .content-wrapper .content-tabs .dropdown-menu {
            border: 1px solid #ccc;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            right: -1px;
        }

        .content-wrapper .content-tabs .roll-nav, .page-tabs-list {
            color: #475059;
            height: 39px;
            position: absolute;
            text-align: center;
            top: 0;
            width: 40px;
            z-index: 2;
        }
        .content-wrapper .content-tabs button {
            background: #fff none repeat scroll 0 0;
            border: 0 none;
            height: 39px;
            line-height: 39px;
            outline: 0 none;
            width: 40px;
        }

        .content-wrapper .content-tabs nav.page-tabs {
            height: 40px;
            margin-left: 40px;
            overflow: hidden;
            width: 100000px;
        }
        .content-wrapper .content-tabs nav.page-tabs .page-tabs-content {
            float: left;
        }
        .content-wrapper .content-tabs .page-tabs a:first-child {
            padding-right: 15px;
        }
        .content-wrapper .content-tabs .page-tabs a {
            border-right: 0 solid #ddd;
            color: #475059;
            display: block;
            float: left;
            padding: 0 8px 0 15px;
            text-decoration: none;
        }
        .content-wrapper .content-tabs .page-tabs a.active {
            background: #222d32 none repeat scroll 0 0;
            border-right: 1px solid #2c3e50;
            color: #fff;
        }
        .content-wrapper .content-tabs .page-tabs a i {
            color: #999;
            margin-top: -10px;
            position: relative;
            right: 0;
        }


    </style>
    @yield('script')

    <script>
        window.learun = {};
        (function ($, learun) {
            "use strict";
            //基础方法
            $.extend(learun, {
                //初始化
                init: function (opt) {
                    learun.theme.type = opt.themeType;
                },
                childInit: function (opt) {
                    $('.toolbar').authorizeButton();
                    learun.theme.setType();
                    if (learun.excel != undefined)
                    {
                        learun.excel.init();
                    }
                    learun.ajaxLoading(false);
                },
                //皮肤主题
                theme: {
                    type: "1",
                    setType: function () {
                        switch (top.learun.theme.type) {
                            case "1"://经典版
                                $('body').addClass('uiDefault');
                                break;
                            case "2"://风尚版
                                $('body').addClass('uiLTE');
                                break;
                            case "3"://炫动版
                                $('body').addClass('uiWindows');
                                break;
                            case "4"://飞扬版
                                $('body').addClass('uiPretty');
                                break;
                        }
                    }
                },
                //加载提示
                loading: function (ops) {//加载动画显示与否
                    var ajaxbg = top.$("#loading_background,#loading_manage");
                    if (ops.isShow) {
                        ajaxbg.show();
                    } else {
                        if (top.$("#loading_manage").attr('istableloading') == undefined) {
                            ajaxbg.hide();
                            top.$(".ajax-loader").remove();
                        }
                    }
                    if (!!ops.text) {
                        top.$("#loading_manage").html(ops.text);
                    } else {
                        top.$("#loading_manage").html("正在拼了命为您加载…");
                    }
                    top.$("#loading_manage").css("left", (top.$('body').width() - top.$("#loading_manage").width()) / 2 - 54);
                    top.$("#loading_manage").css("top", (top.$('body').height() - top.$("#loading_manage").height()) / 2);
                },
                ajaxLoading: function (isShow) {
                    var $obj = $('#ajaxLoader');
                    if (isShow) {
                        $obj.show();
                    }
                    else {
                        $obj.fadeOut();
                    }
                },
                //获取窗口Id
                tabiframeId: function () {//tab窗口Id
                    return top.$(".LRADMS_iframe:visible").attr("id");
                },
                //获取当前窗口
                currentIframe: function () {
                    if (top.frames[learun.tabiframeId()].contentWindow != undefined) {
                        return top.frames[learun.tabiframeId()].contentWindow;
                    }
                    else {
                        return top.frames[learun.tabiframeId()];
                    }
                },
                //获取iframe窗口
                getIframe: function (Id) {
                    var obj = frames[Id];
                    if (obj != undefined) {
                        if (obj.contentWindow != undefined) {
                            return obj.contentWindow;
                        }
                        else {
                            return obj;
                        }
                    }
                    else {
                        return null;
                    }
                },
                //刷新页面
                reload: function () {
                    location.reload();
                    return false;
                }
            })
        })(window.jQuery, window.learun);
    </script>
    <script src="http://learun.cn:8090/Content/scripts/plugins/cookie/jquery.cookie.js"></script>
    <script src="/js/yeoman-admin.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $('.menuItem').on('click', $.learuntab.addTab);
        $('.menuTabs').on('click', '.menuTab i', $.learuntab.closeTab);
        $('.menuTabs').on('click', '.menuTab', $.learuntab.activeTab);
        $('.tabLeft').on('click', $.learuntab.scrollTabLeft);
        $('.tabRight').on('click', $.learuntab.scrollTabRight);
        $('.tabReload').on('click', $.learuntab.refreshTab);
        $('.tabCloseCurrent').on('click', function () {
            $('.page-tabs-content').find('.active i').trigger("click");
        });
        $('.tabCloseAll').on('click', function () {
            $('.page-tabs-content').children("[data-id]").find('.fa-remove').each(function () {
                $('.LRADMS_iframe[data-id="' + $(this).data('id') + '"]').remove();
                $(this).parents('a').remove();
            });
            $('.page-tabs-content').children("[data-id]:first").each(function () {
                $('.LRADMS_iframe[data-id="' + $(this).data('id') + '"]').show();
                $(this).addClass("active");
            });
            $('.page-tabs-content').css("margin-left", "0");
        });
        $('.tabCloseOther').on('click', $.learuntab.closeOtherTabs);
        $('.fullscreen').on('click', function () {
            if (!$(this).attr('fullscreen')) {
                $(this).attr('fullscreen', 'true');
                $.learuntab.requestFullScreen();
            } else {
                $(this).removeAttr('fullscreen')
                $.learuntab.exitFullscreen();
            }
        });





        $("body").removeClass("hold-transition")
        $("#content-wrapper").find('.mainContent').height($(window).height() - 90);
        //$("#sidebar-menu").height($(window).height() - 170);
        $(window).resize(function (e) {
            //$("#content-wrapper").find('.mainContent').height($(window).height() - 90);
            //$("#sidebar-menu").height($(window).height() - 170);
            dataId=top.$.cookie('currentmoduleId');
            pageheight=$('#iframe'+dataId).contents().find('body').get(0).scrollHeight;
            //console.log(pageheight);
            $(".mainContent").height(pageheight);
        });


        $.widget.bridge('uibutton', $.ui.button);
    </script>

    <script>
        //定位后台菜单
        $('.sidebar-menu .active').parent().parent().addClass('active');

    </script>

    <script>
        // Switchery
        $(document).ready(function() {
            if ($(".js-switch")[0]) {
                var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
                elems.forEach(function (html) {
                    var switchery = new Switchery(html, {
                        color: '#26B99A'
                    });
                });
            }
        });
        // /Switchery

        // iCheck
        $(document).ready(function() {
            if ($("input.flat")[0]) {
                $(document).ready(function () {
                    $('input.flat').iCheck({
                        checkboxClass: 'icheckbox_flat-green',
                        radioClass: 'iradio_flat-green'
                    });
                });
            }
        });
        // /iCheck
    </script>
    </body>

@stop

