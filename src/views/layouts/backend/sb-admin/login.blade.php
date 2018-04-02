@extends('yeoman::layouts.backend.sb-admin.master')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{trans('yeoman.login_message') }}</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url(config('yeoman.login_url', 'login')) }}" method="post">
                            {!! csrf_field() !!}
                            <fieldset>
                                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                           placeholder="{{ trans('yeoman.email') }}">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}"">
                                    <input type="password" name="password" class="form-control"
                                           placeholder="{{ trans('yeoman.password') }}">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox" name="remember"> {{ trans('yeoman.remember_me') }}
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit"
                                        class="btn btn-lg btn-success btn-block">{{ trans('yeoman.sign_in') }}</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/skins/square/green.css') }}">

    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
                increaseArea: '20%' // optional
            });
        });
    </script>

@stop
