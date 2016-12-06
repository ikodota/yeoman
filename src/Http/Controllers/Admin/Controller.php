<?php
/**
 * 在这里，您可以轻松创建多个管理后台，登陆认证完全独立，比如管理后台的guard是admin ,商户后台是merchant等等。
 */
namespace Ikodota\Yeoman\Http\Controllers\Admin;

use Ikodota\Yeoman\YeomanController;
class Controller extends YeomanController
{
    protected function guardName()
    {
        return 'admin';
    }

}
