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
        <div class="col-md-12">
            {!! $ui::box_start() !!}
            {!! $ui::box_content_start() !!}
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-3 col-md-2" >
                                <h5><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Laravel Log Viewer</h5>
                                <p class="text-muted"><i>by Rap2h</i></p>
                                <div class="list-group">
                                    @foreach($files as $file)
                                        <a href="?l={{ base64_encode($file) }}" class="list-group-item @if ($current_file == $file) llv-active @endif">
                                            {{$file}}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-9 col-md-10 table-container">
                                @if ($logs === null)
                                    <div>
                                        Log file >50M, please download it.
                                    </div>
                                @else
                                    <table id="table-log" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Level</th>
                                            <th>Date</th>
                                            <th>Content</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($logs as $key => $log)
                                            <tr>
                                                <td class="text-{{{$log['level_class']}}}"><span class="glyphicon glyphicon-{{{$log['level_img']}}}-sign" aria-hidden="true"></span> &nbsp;{{$log['level']}}</td>
                                                <td class="date">{{{$log['date']}}}</td>
                                                <td class="text">
                                                    @if ($log['stack']) <a class="pull-right expand btn btn-default btn-xs" data-display="stack{{{$key}}}"><span class="glyphicon glyphicon-search"></span></a>@endif
                                                    {{{$log['text']}}}
                                                    @if (isset($log['in_file'])) <br />{{{$log['in_file']}}}@endif
                                                    @if ($log['stack']) <div class="stack" id="stack{{{$key}}}" style="display: none; white-space: pre-wrap;">{{{ trim($log['stack']) }}}</div>@endif
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                @endif

                            </div>
                        </div>
                    </div>
            {!! $ui::box_content_stop() !!}
                {!! $ui::box_footer_start() !!}
            <a href="?dl={{ base64_encode($current_file) }}"><span class="glyphicon glyphicon-download-alt"></span> Download file</a>
            -
            <a id="delete-log" href="?del={{ base64_encode($current_file) }}"><span class="glyphicon glyphicon-trash"></span> Delete file</a>
                {!! $ui::box_footer_stop() !!}
            {!! $ui::box_stop() !!}
        </div>
    </div>
@stop


@section('style')
    <style>
        .stack {
            font-size: 0.85em;
        }
        .date {
            min-width: 75px;
        }
        .text {
            word-break: break-all;
        }
        a.llv-active {
            z-index: 2;
            background-color: #f5f5f5;
            border-color: #777;
        }
    </style>
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
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }} "></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#table-log').DataTable({
                "order": [ 1, 'desc' ],
                "stateSave": true,
                "stateSaveCallback": function (settings, data) {
                    window.localStorage.setItem("datatable", JSON.stringify(data));
                },
                "stateLoadCallback": function (settings) {
                    var data = JSON.parse(window.localStorage.getItem("datatable"));
                    if (data) data.start = 0;
                    return data;
                }
            });
            $('.table-container').on('click', '.expand', function(){
                $('#' + $(this).data('display')).toggle();
            });
            $('#delete-log').click(function(){
                return confirm('Are you sure?');
            });
        });
    </script>
    @stack('script')
@stop


