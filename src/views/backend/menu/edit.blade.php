@extends('yeoman::layouts.backend.'.config('yeoman.admin_theme').'.page')

@section('side_menu')
    @inject('imenu','Ikodota\Yeoman\Models\Menu')
    {!! $imenu::getSidebar() !!}
@stop

@section('content_header')
    @inject('ui','Ikodota\Yeoman\Classes\UI)
    {!! $ui::breadCrumb('',trans('yeoman.page.edit')) !!}
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-xs-12 ">
            <form class="form-horizontal" action="{{ route('system.menu.update',$menu->id) }}" method="post" enctype="multipart/form-data">
                {!! $ui::box_start() !!}
                {!! $ui::box_header('ID:'.$menu->id) !!}
                {!! $ui::box_content_start() !!}
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="_referer" value="{{ $referer_url}}">
                <div class="form-group">
                    <label for="parent_id" class="col-sm-3  control-label">{{ trans('yeoman.menu.parent_menu') }}</label>
                    <div class="col-sm-9">
                        <select id="parent_id" name="parent_id" class="select2_single form-control" tabindex="-1">
                            <option value="0">/</option>
                            @foreach($tree as $tmenu)
                                <option value="{{$tmenu->id}}" @if($tmenu->id == $menu->parent_id) selected @endif >{{$tmenu->html}} {{$tmenu->display_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">{{ trans('yeoman.menu.menu_name') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="display_name" name="display_name" placeholder="{{ trans('yeoman.menu.menu_name') }}"  value="{{ $menu->display_name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="icon" class="col-sm-3 control-label">{{ trans('yeoman.menu.icon') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="icon" name="icon"  value="{{ $menu->icon }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="url" class="col-sm-3 control-label">{{ trans('yeoman.menu.url') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="url" name="url" value="{{ $menu->url }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="permission" class="col-sm-3 control-label">{{ trans('yeoman.menu.visit_permission') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="permission" name="permission" value="{{old('permission')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="is_system" class="col-sm-3 control-label">{{ trans('yeoman.menu.is_system') }}</label>
                    <div class="col-sm-9">
                        <div class="radio">
                            <label>
                                <div class="iradio_flat-green" ><input class="flat" name="is_system" value="1" @if($menu->is_system) checked @endif type="radio"></div>{{ trans('yeoman.bool.yes') }}
                            </label>
                            <label>
                                <div class="iradio_flat-green" ><input class="flat" name="is_system" value="0" @if(!$menu->is_system) checked @endif type="radio"></div>{{ trans('yeoman.bool.no') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="is_display" class="col-sm-3 control-label">{{ trans('yeoman.menu.is_display') }}</label>
                    <div class="col-sm-9">
                        <div class="radio">
                            <label>
                                <div class="iradio_flat-green" ><input class="flat" name="is_display" value="1"  @if($menu->is_display) checked @endif type="radio"></div>{{ trans('yeoman.bool.yes') }}
                            </label>
                            <label>
                                <div class="iradio_flat-green" ><input class="flat" name="is_display"  value="0" @if(!$menu->is_display) checked @endif  type="radio"></div>{{ trans('yeoman.bool.no') }}
                            </label>
                        </div>
                    </div>
                </div>
                {!! $ui::box_content_stop() !!}
                {!! $ui::box_footer_start() !!}
                <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-3">
                    <button type="reset" class="btn btn-default" onclick="javascript:history.back();return false;">{{ trans('common.button.back') }}</button>
                    <button type="submit" class="btn btn-success">{{ trans('common.button.submit') }}</button>
                </div>
                {!! $ui::box_footer_stop() !!}
                {!! $ui::box_stop() !!}

            </form>
        </div>
    </div>
@stop



@section('style')
    <link rel="stylesheet" href="{{ asset('vendors/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/iCheck/skins/flat/green.css') }}">
    @stack('style')
@stop


@section('script')
    <script src="{{ asset('vendors/select2/dist/js/select2.full.min.js') }} "></script>

    <!-- Select2 -->
    <script>
        $(document).ready(function() {
            $(".select2_single").select2({
                placeholder: "选择父级菜单",
                allowClear: true
            });
        });
    </script>
    <!-- /Select2 -->
    <script src="{{ asset('vendors/iCheck/icheck.min.js') }} "></script>

    @stack('script')
@stop