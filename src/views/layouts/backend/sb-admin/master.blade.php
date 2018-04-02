<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Control Platform -@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('plugins/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('theme/sb-admin/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

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
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>



</head>

<body>

@yield('body')

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('plugins/metisMenu/metisMenu.min.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('theme/sb-admin/dist/js/sb-admin-2.js') }}"></script>
</body>

</html>
