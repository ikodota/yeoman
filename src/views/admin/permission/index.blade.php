@extends('layouts.admin_page')

@section('title', '权限管理')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>权限列表</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('admin.message.success');
                    @include('admin.message.error');
                    <p>权限列表及编辑等操作</p>
                    <a href="{{route('system.permission.create')}}" class="btn btn-success">创建权限</a>
                    <!-- start project list -->
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>权限编码</th>
                            <th>权限名称</th>
                            <th>权限描述</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($permissions as $permission)
                        <tr>
                            <td>#</td>
                            <td>
                                <a>{{ $permission->name }}</a>
                                <br>
                                <small>Created {{ $permission->created_at }}</small>
                            </td>
                            <td>
                                {{ $permission->display_name }}
                            </td>
                            <td >
                                {{ $permission->description }}
                            </td>
                            <td>
                                <a href="{{route('system.permission.show',$permission->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-users"></i> Roles </a>
                                <a href="{{route('system.permission.edit',$permission->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#defalutModal" data-url="{{route('system.permission.destroy',$permission->id)}}>
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
                    @if($permissions->render() !== "")
                        <div class="box-footer">
                            {!! $permissions->render() !!}
                        </div>
                    @endif
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
    @include('admin.modal.default',['model_title'=>'操作提示','model_content'=>'你确定要删除这个权限吗?'])
@stop
