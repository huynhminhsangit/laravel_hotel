<?php

namespace App\Providers;

use App\Models\SettingModel;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Share setting data all page one time
        $settingModel  = new SettingModel();
        $itemsSetting  = $settingModel->listItems(null, ['task' => 'news-list-items']);
        view()->share('itemsSetting', $itemsSetting);
    }
}
