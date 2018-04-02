@extends('yeoman::layouts.backend.'.@config('yeoman.admin_theme').'.page')

@section('side_menu')
    @inject('menu','Ikodota\Yeoman\Models\Menu')
    {!! $menu::getSidebar() !!}
@stop

@section('content_header')
    @inject('ui','Ikodota\Yeoman\Classes\UI)
    {!! $ui::breadCrumb('',trans('yeoman.permission.role')) !!}
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('yeoman::backend.message.success')
            @include('yeoman::backend.message.error')
            <form class="form-horizontal" action="{{ route('system.permission.attach',$permission->id) }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put">
            {!! $ui::box_start() !!}
            {!! $ui::box_header(''.$permission->name.' [ '.$permission->display_name.' ]') !!}
            {!! $ui::box_content_start() !!}
                        <!-- start roles list -->
                        <div class="form-group">
                            @forelse($roles as $role)
                                <div class="col-md-2 col-sm-3 col-xs-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="flat" @if(in_array($role->name,$permission_roles_names) ) checked="checked" @endif > <span data-toggle="tooltip" data-placement="top" title="{{ $role->description }}">{{ $role->display_name }}</span>
                                        </label>
                                    </div>
                                </div>

                            @empty
                                暂无数据
                        @endforelse
                        <!-- end roles list -->
                        </div>

                {!! $ui::box_content_stop() !!}
                {!! $ui::box_footer_start() !!}
                <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-3">
                    <button type="button" class="btn btn-default" onclick="javascript:history.back();return false;">{{ trans('common.button.back') }}</button>
                    <button type="submit" class="btn btn-success">{{ trans('common.button.submit') }}</button>
                </div>
                {!! $ui::box_footer_stop() !!}
                {!! $ui::box_stop() !!}
            </form>
        </div>
    </div>
@stop


@section('style')
    <link rel="stylesheet" href="{{ asset('vendors/iCheck/skins/flat/green.css') }}">
    @stack('style')
@stop



@section('script')
    <script src="{{ asset('vendors/iCheck/icheck.min.js') }} "></script>
    <script>
        $('#sidebar-menu').attr('data-customurl','{{ route('system.permission.index') }}')
    </script>
    @stack('script')
@stop


