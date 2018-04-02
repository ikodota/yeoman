<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">--}}
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('theme/adminlte/dist/css/AdminLTE.min.css') }}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{ asset('theme/adminlte/dist/css/skins/_all-skins.min.css') }}">

<style type="text/css">
    /** Select2 **/
    .select2-container--default .select2-selection--single,
    .select2-container--default .select2-selection--multiple {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 0;
        min-height: 38px; }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #73879C;
        padding-top: 5px; }

    .select2-container--default .select2-selection--multiple .select2-selection__rendered {
        padding-top: 3px; }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 36px; }

    .select2-container--default .select2-selection--multiple .select2-selection__choice,
    .select2-container--default .select2-selection--multiple .select2-selection__clear {
        margin-top: 2px;
        border: none;
        border-radius: 0;
        padding: 3px 5px; }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border: 1px solid #ccc; }

    /** /Select2 **/
    /** Switchery **/
    .switchery {
        width: 32px;
        height: 20px; }

    .switchery > small {
        width: 20px;
        height: 20px; }

    /** /Switchery **/

    /* *********  form tags input  **************************** */
    .tagsinput {
        border: 1px solid #CCC;
        background: #FFF;
        padding: 6px 6px 0;
        width: 300px;
        overflow-y: auto; }

    span.tag {
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        display: block;
        float: left;
        padding: 5px 9px;
        text-decoration: none;
        background: #1ABB9C;
        color: #F1F6F7;
        margin-right: 5px;
        font-weight: 500;
        margin-bottom: 5px;
        font-family: helvetica; }

    span.tag a {
        color: #F1F6F7 !important; }

    .tagsinput span.tag a {
        font-weight: bold;
        color: #82ad2b;
        text-decoration: none;
        font-size: 11px; }

    .tagsinput input {
        width: 80px;
        margin: 0px;
        font-family: helvetica;
        font-size: 13px;
        border: 1px solid transparent;
        padding: 3px;
        background: transparent;
        color: #000;
        outline: 0px; }

    .tagsinput div {
        display: block;
        float: left; }

    .tags_clear {
        clear: both;
        width: 100%;
        height: 0px; }
    .not_valid {
        background: #FBD8DB !important;
        color: #90111A !important; }

    .tag {
        line-height: 1;
        background: #1ABB9C;
        color: #fff !important; }

    .tag:after {
        content: " ";
        height: 30px;
        width: 0;
        position: absolute;
        left: 100%;
        top: 0;
        margin: 0;
        pointer-events: none;
        border-top: 14px solid transparent;
        border-bottom: 14px solid transparent;
        border-left: 11px solid #1ABB9C; }
</style>
@yield('style')
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->


    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Slimscroll -->
    <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('plugins/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('theme/adminlte/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
   {{-- <script src="{{ asset('theme/adminlte/dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('theme/adminlte/dist/js/demo.js') }}"></script>--}}

</head>
<body class="@yield('body_class')">

@yield('body')

<!-- ./wrapper -->

</body>
</html>
