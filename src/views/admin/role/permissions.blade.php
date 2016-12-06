@extends('layouts.admin_page')

@section('title', '角色权限')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>角色权限 - ({{ $role->display_name }})</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('admin.message.success');
                    @include('admin.message.error');
                    <form class="form-horizontal" action="{{ route('system.role.give',$role->id) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="put">
                        <p>为角色分配权限</p>
                        <!-- start permission  list -->
                        <div class="form-group">
                            @forelse($permissions as $permission)
                                <div class="col-md-2 col-sm-3 col-xs-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="flat" @if(in_array($permission->name,$role_permissions_names) ) checked="checked" @endif > <a href="#" data-toggle="popover" data-trigger="hover" data-placement="top"  data-content="{{ $permission->description }}">{{ $permission->display_name }}</a>
                                        </label>
                                    </div>
                                </div>

                            @empty
                                暂无数据
                            @endforelse
                            <!-- end permission list -->
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-3">
                                <button type="button" class="btn btn-default" onclick="javascript:history.back('{{ route('system.role.index') }}');return false;">{{ trans('common.button.back') }}</button>
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
        $('#sidebar-menu').attr('data-customurl','admin/system/role')
        $(function () { $("[data-toggle='popover']").popover(); });
    </script>
    @stack('script')
@stop


