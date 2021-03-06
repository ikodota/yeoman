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
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>数据日志</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <ol>
                        @forelse ($audits as $audit)
                            <li>
                                {{ $audit->customMessage }}
                                <ul>
                                    @forelse ($audit->customFields as $custom)
                                        <li>{{ $custom }}</li>
                                    @empty
                                        <li>No details</li>
                                    @endforelse
                                </ul>
                            </li>
                        @empty
                            <p>No audits</p>
                        @endforelse
                    </ol>
                    <!-- end project list -->
                    @if($audits->render() !== "")
                        <div class="box-footer">
                            {!! $audits->render() !!}
                        </div>
                    @endif
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-3">
                            <button type="button" class="btn btn-default" onclick="javascript:history.back('{{ route('admin.auditing') }}');return false;">{{ trans('common.button.back') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop



@section('script')
    <script>
        $('#sidebar-menu').attr('data-customurl','{{ route('admin.auditing') }}')
    </script>
    @stack('script')
@stop