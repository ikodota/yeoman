<!-- Modal -->
<div class="modal fade " id="alertModal_{{$model_id}}" tabindex="-1" role="dialog" aria-labelledby="myAlertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myAlertModalLabel">{{ $model_title or  trans('yeoman.modal.alert') }}</h4>
            </div>
            <div class="modal-body">
                <p>{{ $model_content or  ''}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-defalut" data-dismiss="modal">{{ trans('yeoman.button.close') }}</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->