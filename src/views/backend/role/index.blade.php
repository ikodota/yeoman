@extends('yeoman::layouts.backend.'.@config('yeoman.admin_theme').'.page')

@section('side_menu')
    @inject('menu','Ikodota\Yeoman\Models\Menu')
    {!! $menu::getSidebar() !!}
@stop

@section('content_header')
    @inject('ui','Ikodota\Yeoman\Classes\UI)
    {!! $ui::breadCrumb('',trans('yeoman.page.list')) !!}
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('yeoman::backend.message.success')
            @include('yeoman::backend.message.error')
            {!! $ui::box_start() !!}
            {!! $ui::box_header('<a href="'.route('system.role.create').'" class="btn btn-success">'.trans('yeoman.role.create').'</a>') !!}
            {!! $ui::box_content_start() !!}
                    <!-- start project list -->
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>角色编码</th>
                            <th>角色名称</th>
                            <th>角色描述</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($roles as $role)
                        <tr>
                            <td>#</td>
                            <td>
                                <a>{{ $role->name }}</a>
                                <br>
                                <small>Created {{ $role->created_at }}</small>
                            </td>
                            <td>
                                {{ $role->display_name }}
                            </td>
                            <td >
                                {{ $role->description }}
                            </td>
                            <td>
                                @if($role->name != 'super_admin')
                                    <a href="{{route('system.role.show',$role->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-key"></i> Permissions </a>

                                    <a href="{{route('system.role.edit',$role->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                    <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#defalutModal" data-url="{{ route('system.role.destroy',$role->id) }}">
                                        <i class="fa fa-trash-o"></i> Delete
                                    </a>
                                @endif
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
            {!! $ui::box_content_stop() !!}

            {!! $ui::box_footer_start() !!}
                {!! $roles->render() !!}
            {!! $ui::box_footer_stop() !!}

            {!! $ui::box_stop() !!}
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
    @include('yeoman::backend.modal.default',['model_title'=>'操作提示','model_content'=>'你确定要删除这名角色吗?'])
@stop
