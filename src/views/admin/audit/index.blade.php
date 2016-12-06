@extends('layouts.admin_page')

@section('title', '数据跟踪')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>数据跟踪</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('admin.message.success');
                    @include('admin.message.error');

                    <!-- start project list -->
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>时间/IP</th>
                            <th>操作者</th>
                            <th>路由/模型</th>
                            <th>数据ID</th>
                            <th>更新数据</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($audits as $audit)
                        <tr>
                            <td>#</td>
                            <td>
                                {{ $audit->created_at }}
                                IP:<small>{{ $audit->ip_address }}</small>
                            </td>
                            <td>
                                {{ $audit->user_id }}
                            </td>
                            <td >
                                {{ $audit->route }}
                                {{ $audit->auditable_type }}
                            </td>
                            <td>
                                {{ $audit->auditable_id }}
                            </td>
                            <td>
                                <ul>
                                    @foreach (json_decode($audit->new) as $key=>$value)
                                    <li>{{ $key }} ：{{ $value }} </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <a href="{{route('system.audit.logs',$audit->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Logs </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">暂无数据</td>
                        </tr>
                        @endforelse

                        </tbody>
                    </table>
                    <!-- end project list -->
                    @if($audits->render() !== "")
                        <div class="box-footer">
                            {!! $audits->render() !!}
                        </div>
                    @endif
                </div>
            </div>
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
    @include('admin.modal.default',['model_title'=>'操作提示','model_content'=>'你确定要删除这名角色吗?'])
@stop
