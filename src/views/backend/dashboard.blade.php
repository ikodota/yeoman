
@extends('yeoman::layouts.backend.'.config('yeoman.admin_theme').'.page')

@section('content_header')
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('style')

    @stack('style')
@stop


@section('script')
    <script> console.log('Hi!'); </script>
    @stack('script')
@stop