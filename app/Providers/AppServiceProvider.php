<?php

namespace App\Providers;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    //framework çalışmaya başladığı zaman otamatik olarak yüklenmiş olarak gelen provider dır.

    public function register()
    {
        //
    }


    public function boot()
    {
        config()->set('settings',Setting::pluck('value','key')->all());

        $this->app["form"]::component('bsText', 'cms.components.form.text', ['name', 'label_name', 'value', 'attributes' => []]);
        $this->app["form"]::component('bsFile', 'cms.components.form.file', ['name', 'label_name', 'attributes' => []]);
        $this->app["form"]->component('bsSelect', 'cms.components.form.select', ['name','value','lists' => [], 'attributes' => []]);
        $this->app["form"]->component('bsTextarea', 'cms.components.form.textarea', ['name', 'label_name', 'value', 'attributes' => []]);
        $this->app["form"]->component('bsDate', 'cms.components.form.date', ['name', 'label_name', 'attributes' => []]);
    }
}
