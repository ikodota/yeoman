@extends('layouts.admin_page')

@section('title', '角色管理')

@section('content')

    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>创建角色</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal" action="{{ route('system.role.store') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">角色标识</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="角色标识" value="{{old('name')}}">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="display_name" class="col-sm-3 control-label">角色名称</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="display_name" name="display_name" placeholder="角色名称" value="{{old('display_name')}}">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">角色描述</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="description" name="description" placeholder="角色描述" value="{{old('description')}}">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-3">
                                <button type="reset" class="btn btn-default" onclick="javascript:history.back('{{ route('system.role.index') }}');return false;">{{ trans('common.button.back') }}</button>
                                <button type="submit" class="btn btn-success">{{ trans('common.button.submit') }}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop
