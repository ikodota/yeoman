
@extends('yeoman::layouts.backend.'.config('yeoman.admin_theme').'.main')

@section('side_menu')
    @inject('menu','Ikodota\Yeoman\Models\Menu')
    {!! $menu::getSidebar() !!}
@stop

@section('content_header')

@stop

@section('content')

@stop

@section('style')

    @stack('style')
@stop


@section('script')
    <script> console.log('Hi!'); </script>
    @stack('script')
@stop