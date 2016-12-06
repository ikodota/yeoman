<?php

namespace Ikodota\Yeoman\Http\Controllers\Admin\Setting;

use App\Http\Requests\Admin\WebsiteForm;
use Ikodota\Yeoman\Models\Settings;
use Illuminate\Http\Request;
use Ikodota\Yeoman\Http\Controllers\Admin\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use League\Flysystem\Exception;

class WebsiteController extends Controller
{
    public function index()
    {
        //dd('test');
        $settings = Settings::where('type', 'website')
            ->get();
        $arr=[];
        foreach ($settings as $setting){
            $arr[$setting->key] = $setting->value;
        }
        return view('admin.setting.website')->with($arr);
    }


    public function save(WebsiteForm $request)
    {
        if (Gate::foruser($this->loggedUser())->denies('admin.setting.website')) {
            abort(403);
        }
        
        $inputs = $request->except('_token');
        try {

            foreach ($inputs as $key => $value)
            {
                $setting = Settings::firstOrNew([
                    'key' => $key,
                ]);
                $setting->value = $value;
                $setting->type = 'website';
                $setting->save();
            }

            if(!isset($inputs['website_status'])){
                $setting = Settings::firstOrNew([
                    'key' => 'website_status',
                ]);
                $setting->value = 'off';
                $setting->type = 'website';
                $setting->save();
            }
            if(!isset($inputs['verify_code_reg'])){
                $setting = Settings::firstOrNew([
                    'key' => 'verify_code_reg',
                ]);
                $setting->value = 'off';
                $setting->type = 'website';
                $setting->save();
            }
            if(!isset($inputs['verify_code_login'])){
                $setting = Settings::firstOrNew([
                    'key' => 'verify_code_login',
                ]);
                $setting->value = 'off';
                $setting->type = 'website';
                $setting->save();
            }
            return redirect()->back()->withSuccess(trans('system.success.save_setting'));
        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
        }
    }


}
