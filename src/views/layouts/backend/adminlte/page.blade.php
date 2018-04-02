@extends('yeoman::layouts.backend.adminlte.master')

@section('body_class')
    hold-transition skin-blue sidebar-mini
@endsection

@section('body')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        @yield('content_header')
    </section>

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->

    @yield('script')
    <script>
        //定位后台菜单
        $('.sidebar-menu .active').parent().parent().addClass('active');

        //子页加载后自动适配高度
        pageheight=document.body.scrollHeight;
        console.log(pageheight);
        parent.$(".mainContent").height(pageheight);
        //$('body').attr('height',pageheight);

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

