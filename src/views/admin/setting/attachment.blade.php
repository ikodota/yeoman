@extends('layouts.admin_page')

@section('title', 'Website setting')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Form Elements</h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                {{--<div class="x_title">
                    <h2>Form validation <small>sub title</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>--}}
                <div class="x_content">
                    @if (Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{Session::get('flash_message')}}
                        </div>
                    @endif
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action="">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="box-header">
                                <h3 class="box-title">{{ trans('setting.attachment.php_env') }}</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('setting.attachment.php_env_desc') }}</label>
                                <div class="col-sm-10">
                                    1. 当前 PHP 环境允许最大单个上传文件大小为: 64M
                                    </br>
                                    2. 当前 PHP 环境允许最大 POST 表单大小为: 64M
                                </div>
                            </div>

                            <div class="box-header">
                                <h3 class="box-title">{{ trans('setting.attachment.thumbnail') }}</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="form-group">
                                <label for="inputIfThumbnail" class="col-sm-2 control-label">{{ trans('setting.attachment.if_thumbnail') }}</label>
                                <div class="col-sm-10">
                                    <input type="checkbox" id="inputIfThumbnail" name="if_thumbnail" @if(isset($if_thumbnail) and $if_thumbnail=='on') checked @endif  data-size="small" data-on-text="{{ trans('common.option.yes') }}" data-off-text="{{ trans('common.option.no') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputIfThumbnail" class="col-sm-2 control-label">{{ trans('setting.attachment.thumbnail_max_width') }}</label>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa ">{{ trans('setting.attachment.width') }}</i></span>
                                        <input type="text" name="thumbnail_max_width" value="{{ $thumbnail_max_width or '' }}" class="form-control" placeholder="800">
                                        <span class="input-group-addon"><i class="fa ">{{ trans('setting.attachment.px') }}</i></span>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa ">{{ trans('setting.attachment.height') }}</i></span>
                                        <input type="text" name="thumbnail_max_height" value="{{ $thumbnail_max_height or '' }}" class="form-control" placeholder="600">
                                        <span class="input-group-addon"><i class="fa ">{{ trans('setting.attachment.px') }}</i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="box-header">
                                <h3 class="box-title">{{ trans('setting.attachment.image_attachment') }}</h3>
                            </div>
                            <div class="form-group">
                                <label for="inputAllowImageFileExt" class="col-sm-2 control-label">{{ trans('setting.attachment.extension_filename') }}</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputAllowImageFileExt" name="allow_image_extension_filename" rows="2" placeholder="png">{{ $allow_image_extension_filename or '' }}</textarea>
                                    <small>{{ trans('setting.attachment.extension_filename_tips') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputImageMaxSize" class="col-sm-2 control-label">{{ trans('setting.attachment.attachment_maxsize') }}</label>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <input type="text" name="inputImageMaxSize" name="allow_image_max_size" value="{{ $allow_image_max_size or '' }}" class="form-control" placeholder="5000">
                                        <span class="input-group-addon"><i class="fa ">{{ trans('setting.attachment.kb') }}</i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="box-header">
                                <h3 class="box-title">{{ trans('setting.attachment.media_attachment') }}</h3>
                            </div>
                            <div class="form-group">
                                <label for="inputAllowMediaFileExt" class="col-sm-2 control-label">{{ trans('setting.attachment.extension_filename') }}</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputAllowMediaFileExt" name="allow_media_extension_filename" rows="2" placeholder="mp3">{{ $allow_media_extension_filename or '' }}</textarea>
                                    <small>{{ trans('setting.attachment.extension_filename_tips') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputImageMaxSize" class="col-sm-2 control-label">{{ trans('setting.attachment.attachment_maxsize') }}</label>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <input type="text" id="inputMediaMaxSize" name="allow_media_max_size" value="{{ $allow_media_max_size or '' }}" class="form-control" placeholder="5">
                                        <span class="input-group-addon"><i class="fa ">{{ trans('setting.attachment.mb') }}</i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="box-header">
                                <h3 class="box-title">{{ trans('setting.attachment.remote_attachment') }}</h3>
                            </div>
                            <div class="form-group">
                                <label for="inputRemoteServer" class="col-sm-2 control-label">{{ trans('setting.attachment.remote_server_type') }}</label>
                                <div class="col-sm-10">
                                    <label><input type="radio" id="inputRemoteServerLocal" name="remote_server_type" value="close" @if(!isset($remote_server_type) or $remote_server_type=='local') checked @endif class="iradio_square-blue" >{{ trans('setting.attachment.remote_local') }}</label>
                                    <label><input type="radio" id="inputRemoteServerFtp" name="remote_server_type" value="ftp" @if(isset($remote_server_type) and $remote_server_type=='ftp') checked @endif class="iradio_square-blue" >{{ trans('setting.attachment.remote_ftp') }}</label>
                                    <label><input type="radio" id="inputRemoteServerOSS" name="remote_server_type" value="oss" @if(isset($remote_server_type) and $remote_server_type=='oss') checked @endif  class="iradio_square-blue" >{{ trans('setting.attachment.remote_alioss') }}</label>
                                    <label><input type="radio" id="inputRemoteServerQiniu" name="remote_server_type" value="qiniu" @if(isset($remote_server_type) and $remote_server_type=='qiniu') checked @endif  class="iradio_square-blue" >{{ trans('setting.attachment.remote_qiniu') }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputRemoteServer" class="col-sm-2 control-label">{{ trans('setting.attachment.remote_server_config') }}</label>
                                <div class="col-sm-10 col-md-10">
                                    <!-- Custom Tabs -->
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab_ftp" data-toggle="tab">FTP服务器</a></li>
                                            <li><a href="#tab_alioss" data-toggle="tab">阿里云OSS</a></li>
                                            <li><a href="#tab_qiniu" data-toggle="tab">七牛云存储</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_ftp">
                                                <div class="form-group">
                                                    <label for="inputIfSSL" class="col-sm-2 control-label">{{ trans('setting.attachment.ftp.if_ssl') }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="checkbox" id="inputIfSSL" name="ftp_if_ssl" @if(isset($ftp_if_ssl) and $ftp_if_ssl=='on') checked @endif  data-on-text="{{ trans('common.option.yes') }}" data-off-text="{{ trans('common.option.no') }}" data-size="small">
                                                        <small>{{ trans('setting.attachment.ftp.if_ssl_tips') }}</small>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputFtpAddr" class="col-sm-2 control-label">{{ trans('setting.attachment.ftp.ftp_addr') }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="inputFtpAddr" name="ftp_addr" value="{{ $ftp_addr or '' }}" class="form-control" placeholder="">
                                                        <small>{{ trans('setting.attachment.ftp.ftp_addr_tips') }}</small>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputFtpPort" class="col-sm-2 control-label">{{ trans('setting.attachment.ftp.ftp_port') }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="inputFtpPort" name="ftp_port" value="{{ $ftp_port or '' }}" class="form-control" placeholder="21">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputFtpAccount" class="col-sm-2 control-label">{{ trans('setting.attachment.ftp.ftp_account') }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="inputFtpAccount" name="ftp_account" value="{{ $ftp_account or '' }}" class="form-control" placeholder="">
                                                        <small>{{ trans('setting.attachment.ftp.ftp_account_tips') }}</small>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputFtpPassword" class="col-sm-2 control-label">{{ trans('setting.attachment.ftp.ftp_password') }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="inputFtpPassword" name="ftp_password" value="{{ $ftp_password or '' }}" class="form-control" placeholder="">
                                                        <small>{{ trans('setting.attachment.ftp.ftp_password_tips') }}</small>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPasv" class="col-sm-2 control-label">{{ trans('setting.attachment.ftp.if_pasv') }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="checkbox" id="inputPasv" name="ftp_if_pasv" @if(isset($ftp_if_pasv) and $ftp_if_pasv=='on') checked @endif  data-on-text="{{ trans('common.option.yes') }}" data-off-text="{{ trans('common.option.no') }}" data-size="small">
                                                        <small>{{ trans('setting.attachment.ftp.if_pasv_tips') }}</small>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputFtpPath" class="col-sm-2 control-label">{{ trans('setting.attachment.ftp.remote_path') }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="inputFtpPath" name="ftp_remote_path" value="{{ $ftp_remote_path or '' }}" class="form-control" placeholder="">
                                                        <small>{{ trans('setting.attachment.ftp.remote_path_tips') }}</small>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputFtpUrl" class="col-sm-2 control-label">{{ trans('setting.attachment.ftp.remote_url') }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="inputFtpUrl" name="ftp_remote_url" value="{{ $ftp_remote_url or '' }}" class="form-control" placeholder="">
                                                        <small>{{ trans('setting.attachment.ftp.remote_url_tips') }}</small>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputFtpExpire" class="col-sm-2 control-label">{{ trans('setting.attachment.ftp.ftp_expire') }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="inputFtpExpire" name="ftp_expire" value="{{ $ftp_expire or '' }}" class="form-control" placeholder="">
                                                        <small>{{ trans('setting.attachment.ftp.ftp_expire_tips') }}</small>
                                                    </div>
                                                </div>
                                                <div class="box-footer">
                                                    <button type="button" id="btnFtpTest" class="btn btn-info pull-right">{{ trans('setting.attachment.test_remote_server') }}</button>
                                                </div>
                                            </div>
                                            <!-- /.tab-pane -->
                                            <div class="tab-pane" id="tab_alioss">
                                                <div class="form-group">
                                                    <label for="inputOssAppKey" class="col-sm-2 control-label">{{ trans('setting.attachment.oss.app_key') }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="inputOssAppKey" name="oss_app_key" value="{{ $oss_app_key or '' }}" class="form-control" placeholder="">
                                                        <small>{{ trans('setting.attachment.oss.app_key_tips') }}</small>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputOssAppSecret" class="col-sm-2 control-label">{{ trans('setting.attachment.oss.app_secret') }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="inputOssAppSecret" name="oss_app_secret" value="{{ $oss_app_secret or '' }}" class="form-control" placeholder="">
                                                        <small>{{ trans('setting.attachment.oss.app_secret_tips') }}</small>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputOssUrl" class="col-sm-2 control-label">{{ trans('setting.attachment.oss.url') }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="inputOssUrl" name="oss_url" value="{{ $oss_url or '' }}" class="form-control" placeholder="">
                                                        <small>{{ trans('setting.attachment.oss.url_tips') }}</small>
                                                    </div>
                                                </div>
                                                <div class="box-footer">
                                                    <button type="button" id="btnOssTest" class="btn btn-info pull-right">{{ trans('setting.attachment.test_remote_server') }}</button>
                                                </div>
                                            </div>
                                            <!-- /.tab-pane -->
                                            <div class="tab-pane" id="tab_qiniu">
                                                <div class="form-group">
                                                    <label for="inputQiniuAppKey" class="col-sm-2 control-label">{{ trans('setting.attachment.qiniu.app_key') }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="inputQiniuAppKey" name="qiniu_app_key" value="{{ $qiniu_app_key or '' }}" class="form-control" placeholder="">
                                                        <small>{{ trans('setting.attachment.qiniu.app_key_tips') }}</small>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputQiniuAppSecret" class="col-sm-2 control-label">{{ trans('setting.attachment.qiniu.app_secret') }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="inputQiniuAppSecret" name="qiniu_app_secret" value="{{ $qiniu_app_secret or '' }}" class="form-control" placeholder="">
                                                        <small>{{ trans('setting.attachment.qiniu.app_secret_tips') }}</small>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputQiniuBucket" class="col-sm-2 control-label">{{ trans('setting.attachment.qiniu.bucket') }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="inputQiniuBucket" name="qiniu_bucket" value="{{ $qiniu_bucket or '' }}" class="form-control" placeholder="">
                                                        <small>{{ trans('setting.attachment.qiniu.bucket_tips') }}</small>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputQiniuUrl" class="col-sm-2 control-label">{{ trans('setting.attachment.qiniu.url') }}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="inputQiniuUrl" name="qiniu_url" value="{{ $qiniu_url or '' }}" class="form-control" placeholder="">
                                                        <small>{{ trans('setting.attachment.qiniu.url_tips') }}</small>
                                                    </div>
                                                </div>
                                                <div class="box-footer">
                                                    <button type="button" id="btnQiniuTest" class="btn btn-info pull-right">{{ trans('setting.attachment.test_remote_server') }}</button>
                                                </div>
                                            </div>
                                            <!-- /.tab-pane -->
                                        </div>
                                        <!-- /.tab-content -->
                                    </div>
                                    <!-- nav-tabs-custom -->
                                </div>
                                <!-- /.col -->
                            </div>


                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">{{ trans('common.button.reset') }}</button>
                            <button type="submit" class="btn btn-info pull-right">{{ trans('common.button.submit') }}</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>

        </div>
    </div>
@stop

@section('style')
    <link rel="stylesheet" href="{{ asset('vendors/iCheck/skins/flat/green.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/webuploader/webuploader.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-switch-master/dist/css/bootstrap3/bootstrap-switch.css') }}" >
    @stack('style')
    @yield('style')
@stop


@section('script')
    <script src="{{ asset('vendors/icheck.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap-switch-master/dist/js/bootstrap-switch.min.js') }}"></script>
    <script src="{{ asset('vendors/webuploader/webuploader.min.js') }}"></script>
    <script>
        $("[name='if_thumbnail']").bootstrapSwitch();
        $("[name='ftp_if_ssl']").bootstrapSwitch();
        $("[name='ftp_if_pasv']").bootstrapSwitch();

        $('#btnQiniuTest').click(function() {
            qiniu_app_key   =$('#inputQiniuAppKey').val();
            qiniu_app_secret=$('#inputQiniuAppSecret').val();
            qiniu_bucket    =$('#inputQiniuBucket').val();
            qiniu_domain    =$('#inputQiniuUrl').val();
            $.getJSON('/admin/setting/attachment/test/qiniu', {
                r:Math.random(),
                qiniu_app_key: qiniu_app_key,
                qiniu_app_secret: qiniu_app_secret,
                qiniu_bucket: qiniu_bucket,
                qiniu_domain: qiniu_domain
            }, function (data) {
                alert(data);
            });
        });
    </script>
    @stack('script')
    @yield('script')
@stop
