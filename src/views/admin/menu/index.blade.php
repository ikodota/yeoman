@extends('yeoman::layouts.admin_page')

@section('title', '菜单管理')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>菜单列表</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('yeoman::admin.message.success');
                    @include('yeoman::admin.message.error');
                    <a href="{{route('admin.menu.create')}}" class="btn btn-success">创建菜单</a>
                    <!-- start project list -->
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>菜单名称</th>
                            <th>菜单标识</th>
                            <th>路由</th>
                            <th>访问权限</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($menus as $menu)
                        <tr>
                            <td>#</td>
                            <td>
                                <a>{{$menu->html}} <i class="fa {{$menu->icon}}"></i> {{ $menu->display_name }}</a>
                            </td>
                            <td>
                                {{ $menu->name }}
                            </td>
                            <td >
                                {{ $menu->route or '' }}
                            </td>
                            <td >
                                {{ $menu->permission or '不限' }}
                            </td>
                            <td>
                                <a href="{{ route('admin.menu.show',$menu->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-key"></i> Permissions </a>

                                <a href="{{ route('admin.menu.edit',$menu->id) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#defalutModal" data-url="{{ route('admin.menu.destroy',$menu->id) }}">
                                    <i class="fa fa-trash-o"></i> Delete
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">暂无数据</td>
                        </tr>
                        @endforelse

                        </tbody>
                    </table>
                    <!-- end project list -->
                </div>
            </div>
        </div>
    </div>
@stop


@section('style')
    <link rel="stylesheet" href="{{ asset('vendors/iCheck/skins/flat/green.css') }}">
    <!-- Switchery -->
    <link href="{{ asset('vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    @stack('style')
@stop



@section('script')
    {{--<script src="{{ asset('vendors/bootstrap-switch-master/dist/js/bootstrap-switch.min.js') }}"></script>--}}
    <script src="{{ asset('vendors/switchery/dist/switchery.min.js') }} "></script>

    <script type="text/javascript">
        $('#defalutModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var url = button.data('url');
            var modal = $(this);
            modal.find('form').attr('action', url);
        })
    </script>
    @stack('script')
@stop

@section('body_dialog')
    @include('yeoman::admin.modal.default',['model_title'=>'操作提示','model_content'=>'你确定要删除这名菜单吗?'])
@stop
