<?php

namespace App\Providers;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
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
        Paginator::useBootstrap();
        if(!app()->runningInConsole()){
            $setting = Setting::firstOr(function () {
            return Setting::create([
            'name' => 'ecommerce',
            'description' => 'ecommerce',
            'email' => 's@s.com',
            'phone' => '12345678',
            'logo'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'whatsapp' => 'whatsapp',
            'twitter' => 'twitter',
            'instagram' => 'instagram',
            'youtube' => 'youtube',
            'facebook' => 'facebook',

        ]);
        });
        view()->share('setting', $setting);
        }
    }
}
