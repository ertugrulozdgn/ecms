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

        $this->app["form"]::component('bsText', 'components.form.text', ['name', 'label_name', 'value' => null, 'attributes' => []]);
        $this->app["form"]::component('bsFile', 'components.form.file', ['name', 'label_name', 'attributes' => []]);
        $this->app["form"]->component('bsSelect', 'components.form.select', ['name', 'label_name','value','lists' => [], 'attributes' => []]);
        $this->app["form"]->component('bsTextarea', 'components.form.textarea', ['name', 'label_name', 'value', 'attributes' => []]);
        $this->app["form"]->component('bsDate', 'components.form.date', ['name', 'label_name', 'attributes' => []]);
    }
}
