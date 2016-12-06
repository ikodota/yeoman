@if(Session::has('errors'))
    <div id="errors-message" class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> {{ $model_title or  '操作提示'}}!</h4>
        {{ $model_content or '你是否确定本次操作?' }}
    </div>
@endif