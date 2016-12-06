@extends('yeoman::layouts.admin_page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('style')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @stack('style')
@stop


@section('script')
    <script> console.log('Hi!'); </script>
    @stack('script')
@stop