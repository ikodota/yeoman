<?php

namespace Ikodota\Yeoman\Controllers\Admin\Setting;

use Illuminate\Support\Facades\Gate;
use Ikodota\Yeoman\Models\Settings;
use Ikodota\Yeoman\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


class AttachmentController extends Controller
{
    public function index()
    {
        //dd('test');

        $settings = Settings::where('type', 'attachment')
            ->get();
        $arr=[];
        foreach ($settings as $setting){
            $arr[$setting->key] = $setting->value;
        }
        return view('yeoman::backend.setting.attachment')->with($arr);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {

        if (Gate::foruser($this->loggedUser())->denies('admin.setting.attachment')) {
            abort(403);
        }
        //neet save in database;
        $inputs = $request->except('_token');
        //$setting = new Settings();
        foreach ($inputs as $key => $value)
        {

            $setting = Settings::firstOrNew([
                'key' => $key,
            ]);
            $setting->value = $value;
            $setting->type = 'attachment';

            $setting->save();
        }
        if(!isset($inputs['if_thumbnail'])){

            $setting = Settings::firstOrNew([
                'key' => 'if_thumbnail',
            ]);
            $setting->value = 'off';
            $setting->type = 'attachment';
           
            $setting->save();
        }
        if(!isset($inputs['ftp_if_ssl'])){
            
            $setting = Settings::firstOrNew([
                'key' => 'ftp_if_ssl',
            ]);
            $setting->value = 'off';
            $setting->type = 'attachment';

            $setting->save();
        }
        if(!isset($inputs['ftp_if_pasv'])){

            $setting = Settings::firstOrNew([
                'key' => 'ftp_if_pasv',
            ]);
            $setting->value = 'off';
            $setting->type = 'attachment';

            $setting->save();
        }

        $request->session()->flash('flash_message', 'Save successful!');
        return redirect()->back();
    }

    public function testQiniu(Request $request)
    {
        //echo $request->input('qiniu_app_key');
        //Config::set('filesystems.default','local');
        //Config::set('filesystems.cloud','qiniu');

        Config::set('filesystems.disks.qiniu.access_key',$request->input('qiniu_app_key'));

        Config::set('filesystems.disks.qiniu.secret_key',$request->input('qiniu_app_secret'));

        Config::set('filesystems.disks.qiniu.bucket',$request->input('qiniu_bucket'));

        Config::set('filesystems.disks.qiniu.domain',$request->input('qiniu_domain'));

        //$config = App::['config']["filesystems.disks.qiniu"];
        //$file1='file.txt';
        //$image1='images/1/2016/09/govKzrf6koFVFJk0t04FfboQETmQHT.jpg';
        $drive = \Storage::drive('qiniu');//选择oss上传引擎
        //dump($contents = \Storage::disk('qiniu')->get($file1));
        //dump($drive->has($image1));
        $test_file='test_file.txt';
        $test_content=date('Y-m-d H:i:s');

        if($drive->has($test_file)){
            $drive->delete($test_file); //删除后重新上传
        }

        $result=$drive->write($test_file,$test_content);
        if($result){
            return 'true';
        }else{
            return 'false';
        }


    }
}
