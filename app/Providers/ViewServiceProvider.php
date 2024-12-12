<?php

namespace App\Providers;

use App\Models\ProjectType;
use App\Models\StoneType;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('partials._navbar', function ($view) {
            $projectTypes = ProjectType::all();
            $stoneTypes = StoneType::all();
            $view->with(compact('projectTypes', 'stoneTypes'));
        });
    }
}
