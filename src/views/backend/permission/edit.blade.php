@extends('yeoman::layouts.backend.'.@config('yeoman.admin_theme').'.page')

@section('side_menu')
    @inject('menu','Ikodota\Yeoman\Models\Menu')
    {!! $menu::getSidebar() !!}
@stop

@section('content_header')
    @inject('ui','Ikodota\Yeoman\Classes\UI)
    {!! $ui::breadCrumb('',trans('yeoman.page.edit')) !!}
@stop

@section('content')

    <div class="row">
        <div class="col-md-6 col-xs-12">
            <form class="form-horizontal" action="{{ route('system.permission.update',$permission->id) }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="_referer" value="{{ $referer_url}}">
                {!! $ui::box_start() !!}
                {!! $ui::box_header('ID:'.$permission->id) !!}
                {!! $ui::box_content_start() !!}
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">权限标识</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="角色标识" value="{{$permission->name}}">

                    </div>
                </div>
                <div class="form-group">
                    <label for="display_name" class="col-sm-3 control-label">权限名称</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="display_name" name="display_name" placeholder="角色名称" value="{{$permission->display_name}}">

                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">权限描述</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="description" name="description" placeholder="角色描述" value="{{$permission->description}}">
                    </div>
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

@section('script')
    <script>

    </script>
    @stack('script')
@stop