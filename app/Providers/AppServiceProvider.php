<?php

namespace App\Providers;

use App\Modules\Jobs\Services\IJobService;
use App\Modules\Jobs\Services\JobService;
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
        $this->app->singleton(IJobService::class, JobService::class);
    }
}
