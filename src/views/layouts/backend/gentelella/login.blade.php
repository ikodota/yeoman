@extends('yeoman::layouts.backend.gentelella.master')
@section('body_class')
    login
@endsection

@section('body')
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form action="{{ url(config('yeoman.login_url', 'login')) }}" method="post">
                            {!! csrf_field() !!}
                            <h1>{!! config('yeoman.logo', '<b>Yeoman</b>Admin') !!}</h1>
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
                            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                                <input type="password" name="password" class="form-control"
                                       placeholder="{{ trans('yeoman.password') }}">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group" style="text-align: left">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox" name="remember"> {{ trans('yeoman.remember_me') }}
                                    </label>
                                </div>
                            </div>
                            <div>
                                <button type="submit"
                                        class="btn btn-default submit">{{ trans('yeoman.sign_in') }}</button>
                                <a class="reset_pass" href="{{ url(config('yeoman.password_email_url', 'password/reset')) }}">{{ trans('yeoman.i_forgot_my_password') }}</a>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                @if (config('yeoman.register_url', 'register'))
                                    <p class="change_link">New to site?
                                        <a href="{{ url(config('yeoman.register_url', 'register')) }}" class="to_register">{{ trans('yeoman.register_a_new_membership') }}</a>
                                    </p>
                                @endif


                                <div class="clearfix"></div>
                                <br />

                                <div>
                                    <h1><i class="fa fa-paw"></i> Yeoman</h1>
                                    <p>©2016 All Rights Reserved.</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>

            </div>
        </div>

        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('plugins/iCheck/skins/square/blue.css') }}">
        <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
@stop

