<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\GoalRepositoryInterface;
use App\Repositories\GoalRepository;
use App\Repositories\TaskRepositoryInterface;
use App\Repositories\TaskRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
    $this->app->bind(
        GoalRepositoryInterface::class, GoalRepository::class
    );

    $this->app->bind(
       TaskRepositoryInterface::class, TaskRepository::class
    );
}
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
