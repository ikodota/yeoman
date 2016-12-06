
    <div id="modal-webuploader" class="modal fade" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog" style="width:660px;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom:0px">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <ul class="nav nav-tabs " role="tablist">
                        <li id="li_upload" class="active" role="presentation"><a href="#upload" aria-controls="upload" role="tab" data-toggle="tab" onclick="$('#select').hide();" aria-expanded="true">上传图片</a></li>
                        <li id="li_network" class="" role="presentation"><a href="#network" aria-controls="network" role="tab" data-toggle="tab" onclick="$('#select').hide();" aria-expanded="false">提取网络图片</a></li>
                        <li id="li_history_image" class="" role="presentation"><a href="#history_image" aria-controls="history_image" role="tab" data-toggle="tab" onclick="$('#select').show();" aria-expanded="false">浏览图片</a></li>
                        <li id="li_history_audio" class="hide" role="presentation"><a href="#history_audio" aria-controls="history_audio" role="tab" data-toggle="tab" onclick="$('#select').hide();">浏览音频</a></li>
                    </ul>
                </div>
                <div class="modal-body tab-content">
                    <div role="tabpanel" class="tab-pane network" id="network">
                        @include('vendor.uploader.network')
                    </div>
                    <div role="tabpanel" class="tab-pane history" id="history_image">
                        @include('vendor.uploader.thumb')
                    </div>
                    <div role="tabpanel" class="tab-pane upload active" id="upload">
                        @include('vendor.uploader.webuploader')
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script>
        $('#modal-webuploader').on('shown.bs.modal', function (event) {
            //等待对话框显示完成后初始化webploader
            initwebuploader();
        })
        function showImageDialog(elm){
            var $btn = $(elm);
            var $input = $btn.parent().prev();
            var val = $input.val();
            var img = $input.parent().next().children();
            $('#modal-webuploader').modal({
                backdrop: true
            });
        }
        function deleteImage(elm){
            $(elm).prev().attr("src", "/img/common/nopic.jpg");
            $(elm).parent().prev().find("input").val("");
        }
    </script>






