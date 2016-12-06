@extends('layouts.admin_page')

@section('title', '权限所属角色')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>附加指定权限到角色 - (权限：{{ $permission->display_name }})</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('admin.message.success');
                    @include('admin.message.error');
                    <form class="form-horizontal" action="{{ route('system.permission.attach',$permission->id) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="put">
                        <p>将一个权限赋予某些角色</p>
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


@section('style')
    <link rel="stylesheet" href="{{ asset('vendors/iCheck/skins/flat/green.css') }}">
    @stack('style')
@stop



@section('script')
    <script src="{{ asset('vendors/iCheck/icheck.min.js') }} "></script>
    <script>
        $('#sidebar-menu').attr('data-customurl','admin/system/permission')
    </script>
    @stack('script')
@stop


