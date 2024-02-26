<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind('App\Repositories\Interfaces\IJobRepo', 'App\Repositories\Classes\JobRepo');
        $this->app->bind('App\Repositories\Interfaces\ICategoryRepo', 'App\Repositories\Classes\CategoryRepo');
        $this->app->bind('App\Repositories\Interfaces\IDealershipRepo', 'App\Repositories\Classes\DealershipRepo');
        $this->app->bind('App\Repositories\Interfaces\IProvinceRepo', 'App\Repositories\Classes\ProvinceRepo');
        $this->app->bind('App\Repositories\Interfaces\IBrandRepo', 'App\Repositories\Classes\BrandRepo');
        $this->app->bind('App\Repositories\Interfaces\IGroupRepo', 'App\Repositories\Classes\GroupRepo');
        $this->app->bind('App\Repositories\Interfaces\IDriverRepo', 'App\Repositories\Classes\DriverRepo');
        $this->app->bind('App\Repositories\Interfaces\IUserRepo', 'App\Repositories\Classes\UserRepo');
        $this->app->bind('App\Repositories\Interfaces\ICandidateRepo', 'App\Repositories\Classes\CandidateRepo');
        $this->app->bind('App\Repositories\Interfaces\IProfileRepo', 'App\Repositories\Classes\ProfileRepo');
        $this->app->bind('App\Repositories\Interfaces\IExperienceRepo', 'App\Repositories\Classes\ExperienceRepo');
    }
}
