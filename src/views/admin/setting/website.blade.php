@extends('layouts.admin_page')

@section('title', 'Website setting')

@section('content')

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ trans('setting.website.title') }}<small></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('layouts.admin_backmessage');
                    <!-- form start -->
                    <form class="form-horizontal form-label-left"  method="post" action="">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <blockquote><p>{{ trans('setting.website.status') }}</p></blockquote>
                            </div>
                            <div class="form-group">
                                <label for="inputSiteStatus" class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('setting.website.status') }}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label><input type="checkbox"  id="inputSiteStatus" name="website_status" class="js-switch" @if(isset($website_status) and $website_status=='on') checked @endif  /></label>
                                    <span class="help-block">如果关闭，网站处于维护模式，仅限管理员访问。</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <blockquote><p>{{ trans('setting.website.base_info') }}</p></blockquote>
                            </div>
                            <div class="form-group">
                                <label for="inputSiteName" class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('setting.website.name') }}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" id="inputSiteName" name="website_name" value="{{ $website_name or '' }}" placeholder="{{ trans('setting.website.name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSiteUrl" class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('setting.website.domain') }}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" id="inputSiteUrl" name="website_domain" value="{{ $website_domain or '' }}" placeholder="{{ trans('setting.website.domain') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputLogo" class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('setting.website.logo') }}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" id="inputLogo" name="website_logo" value="{{ $website_logo or '' }}" placeholder="{{ trans('setting.website.logo') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('setting.website.logo') }}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="input-group">
                                        <input type="text" name="" value=""  class="form-control" autocomplete="off">
                                    <span class="input-group-btn">
                                      <button type="button" class="btn btn-default btn-flat" onclick="showImageDialog(this);">选择文件</button>
                                    </span>
                                    </div>
                                    <!-- /.input group -->
                                    <div class="input-group " style="margin-top:.5em;">
                                        <img src="{{ $website_logo_url or '/img/common/nopic.jpg' }}"  class="img-responsive img-thumbnail"  width="150" />
                                        <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="deleteImage(this)">×</em>
                                    </div>
                                </div>
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label for="inputIntro" class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('setting.website.intro') }}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control" id="inputIntro" name="website_intro" rows="2" placeholder="{{ trans('setting.website.intro') }}">{{ $website_intro or '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputKeyword"  class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('setting.website.keywords') }}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="tags form-control" id="inputKeyword" name="website_keywords" value="{{ $website_keywords or '' }} "/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDescription" class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('setting.website.description') }}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" id="inputDescription" name="website_description" value="{{ $website_description or '' }}" placeholder="{{ trans('setting.website.description') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputCode" class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('setting.website.code') }}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control" id="inputCode" name="website_code" rows="3" placeholder="{{ trans('setting.website.code') }}">{{ $website_code or '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <blockquote><p>{{ trans('setting.website.verify_code') }}</p></blockquote>
                            </div>
                            <div class="form-group">
                                <label for="VerifyCodeReg" class="col-sm-3 control-label">{{ trans('setting.website.reg_verify_code') }}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label><input type="checkbox"  id="VerifyCodeReg" name="verify_code_reg" class="js-switch" @if(isset($verify_code_reg) and $verify_code_reg=='on') checked @endif  /></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="VerifyCodelogin" class="control-label col-md-3 col-sm-3 col-xs-12">{{ trans('setting.website.login_verify_code') }}</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label><input type="checkbox"  id="VerifyCodelogin" name="verify_code_login" class="js-switch" @if(isset($verify_code_login) and $verify_code_login=='on') checked @endif  /></label>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-3">
                                    <button type="reset" class="btn btn-primary">{{ trans('common.button.reset') }}</button>
                                    <button type="submit" class="btn btn-success">{{ trans('common.button.submit') }}</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </form>
                </div>
            </div>

        </div>
    </div>
@stop

@section('body_dialog')
    @include('vendor.uploader.uploader')

@stop

@section('style')
    <link rel="stylesheet" href="{{ asset('vendors/iCheck/skins/flat/green.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/webuploader/webuploader.css') }}">
    <!-- Switchery -->
    <link href="{{ asset('vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">

    @stack('style')
@stop



@section('script')
    {{--<script src="{{ asset('vendors/bootstrap-switch-master/dist/js/bootstrap-switch.min.js') }}"></script>--}}
    <script src="{{ asset('vendors/switchery/dist/switchery.min.js') }} "></script>
    <!-- jQuery Tags Input -->
    <script src="{{ asset('vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
    <!-- jQuery Tags Input -->
    <script>

        $(document).ready(function() {
            $('#inputKeyword').tagsInput({
                'width': 'auto',
                'defaultText':'{{ trans('common.text.tag') }}',
                'height':'40px',
                'delimiter':',',
            });
        });
    </script>
    <!-- /jQuery Tags Input -->
    <script src="{{ asset('vendors/webuploader/webuploader.min.js') }}"></script>
    @stack('script')
@stop