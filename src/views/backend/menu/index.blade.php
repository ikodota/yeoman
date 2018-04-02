@extends('yeoman::layouts.backend.'.@config('yeoman.admin_theme').'.page')
{{--
@section('side_menu')
    @inject('menu','Ikodota\Yeoman\Models\Menu')
    {!! $menu::getSidebar() !!}
@stop--}}


@section('content_header')
    @inject('ui','Ikodota\Yeoman\Classes\UI)
    {!! $ui::breadCrumb('',trans('yeoman.page.list')) !!}
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
        {!! $ui::box_start() !!}
        {!! $ui::box_header('<a href="'.route('system.menu.create').'" class="btn btn-success">'.trans('yeoman.system.menu.create').'</a>') !!}
        {!! $ui::box_content_start() !!}
                    @include('yeoman::backend.message.success')
                    @include('yeoman::backend.message.error')

                    <!-- start project list -->
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('yeoman.menu.menu_name') }}</th>
                            <th>{{ trans('yeoman.menu.url') }}</th>
                            <th>{{ trans('yeoman.menu.visit_permission') }}</th>
                            <th>{{ trans('yeoman.menu.is_system') }}</th>
                            <th>{{ trans('yeoman.menu.is_display') }}</th>
                            <th>{{ trans('yeoman.common.text.operation') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($menus as $menu)
                            <tr>
                                <td>#</td>
                                <td>
                                    <a>{{$menu->html}} <i class="fa {{$menu->icon}}"></i> {{ $menu->display_name }}</a>
                                </td>
                                <td >
                                    {{ $menu->url}}
                                </td>
                                <td >
                                    {{ $menu->permission}}
                                </td>
                                <td >
                                    @if($menu->is_system) {{ trans('yeoman.bool.yes') }} @else {{ trans('yeoman.bool.no') }} @endif
                                </td>
                                <td >
                                    @if($menu->is_display) {{ trans('yeoman.bool.yes') }} @else {{ trans('yeoman.bool.no') }} @endif
                                </td>
                                <td>
                                    <a href="{{ route('system.menu.edit',$menu->id) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> {{ trans('yeoman.common.button.edit') }} </a>
                                    <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#defalutModal" data-url="{{ route('system.menu.destroy',$menu->id) }}">
                                        <i class="fa fa-trash-o"></i> {{ trans('yeoman.common.button.delete') }}
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ trans('yeoman.common.data.no_record') }}</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                    <!-- end project list -->
            {!! $ui::box_content_stop() !!}
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
    @include('yeoman::backend.modal.default',['model_title'=>'操作提示','model_content'=>'你确定要删除这名菜单吗?'])
@stop
