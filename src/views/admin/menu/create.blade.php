@extends('yeoman::layouts.admin_page')

@section('title', '菜单管理')

@section('content')

    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>创建菜单</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal" action="{{ route('admin.menu.store') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label for="parent_id" class="col-sm-3 control-label">父级菜单</label>
                            <div class="col-sm-9">
                                <select id="parent_id" name="parent_id" class="select2_single form-control" tabindex="-1">
                                    <option value="0">/</option>
                                    @foreach($tree as $menu)
                                        <option value="{{$menu->id}}" @if(old('parent_id') == $menu->id) selected @endif >{{$menu->html}} {{$menu->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">菜单名称</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="菜单标识" value="{{old('name')}}">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="icon" class="col-sm-3 control-label">菜单图标</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="icon" name="icon"  value="{{old('icon')}}">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="url" class="col-sm-3 control-label">菜单链接</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="url" name="url" value="{{old('url')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="permission" class="col-sm-3 control-label">访问权限</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="permission" name="permission" value="{{old('permission')}}">
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-3">
                                <button type="reset" class="btn btn-default" onclick="javascript:history.back('{{ route('admin.menu.index') }}}');return false;">{{ trans('common.button.back') }}</button>
                                <button type="submit" class="btn btn-success">{{ trans('common.button.submit') }}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop



@section('style')
    <link rel="stylesheet" href="{{ asset('vendors/select2/dist/css/select2.min.css') }}">
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
    @stack('script')
@stop