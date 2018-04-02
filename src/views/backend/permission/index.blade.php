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
        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <form action="" method="get">
                <div class="col-md-4 col-sm-6 col-xs-12 input-group pull-right ">

                    <div class="form-group">
                        <div class="col-md-6 col-xs-12 form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-4">分组</label>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <select class="form-control ">
                                    <option value="">不限</option>
                                    <option value="system">系统</option>
                                    <option value="setting">设置</option>
                                    <option value="news">新闻</option>
                                    <option value="shop">商城</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 input-group">
                            <input class="form-control" placeholder="Search for..." type="text" name="keyword" value="{{ Request::get('keyword') }}">
                            <span class="input-group-btn">
                              <button class="btn btn-default" type="submit">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
        @include('yeoman::backend.message.success')
        @include('yeoman::backend.message.error')

            {!! $ui::box_start() !!}
                {!! $ui::box_header('<a href="'.route('system.permission.create').'" class="btn btn-success">'.trans('yeoman.permission.create').'</a>') !!}

            {!! $ui::box_content_start() !!}

                <!-- start project list -->
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('yeoman.permission.name') }}</th>
                        <th>{{ trans('yeoman.permission.display_name') }}</th>
                        <th>{{ trans('yeoman.permission.desc') }}</th>
                        <th>{{ trans('yeoman.permission.group') }}</th>
                        <th>{{ trans('yeoman.common.text.operation') }}</th>
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
                            <td>
                                {{ $permission->description }}
                            </td>
                            <td>
                                {{ $permission->class }}
                            </td>
                            <td>
                                <a href="{{route('system.permission.show',$permission->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-users"></i> {{ trans('yeoman.common.button.assign') }} </a>
                                <a href="{{route('system.permission.edit',$permission->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> {{ trans('yeoman.common.button.edit') }} </a>
                                <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#defalutModal" data-url="{{ route('system.permission.destroy',$permission->id) }} ">
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

            {!! $ui::box_footer_start() !!}
                {!! $permissions->appends(['keyword'=>Request::get('keyword')])->render() !!}
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
    @include('yeoman::backend.modal.default',['model_title'=>'操作提示','model_content'=>'你确定要删除这个权限吗?'])
@stop
