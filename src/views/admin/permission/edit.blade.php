@extends('layouts.admin_page')

@section('title', '权限管理')

@section('content')

    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>编辑权限</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal" action="{{ route('system.permission.update',$permission->id) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="put">
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

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-3">
                                <button type="button" class="btn btn-default" onclick="javascript:history.back('{{ route('system.permission.index') }}');return false;">{{ trans('common.button.back') }}</button>
                                <button type="submit" class="btn btn-success">{{ trans('common.button.submit') }}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $('#sidebar-menu').attr('data-customurl','admin/system/permission')
    </script>
    @stack('script')
@stop