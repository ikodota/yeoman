<?php

namespace Ikodota\Yeoman\Presenters;

/**
 * Class UploaderPresenter
 *
 * @package namespace App\Presenters;
 */
class UploaderPresenter
{

    public function getUploadServer(){
        $upload_type='';
        switch ($upload_type){
            case 'image':
            case 'goods':
            case 'media':
                return '/admin/utility/fileupload.php';
                break;
            default :
                return '/admin/utility/fileupload.php';
                break;
        }
    }
}
