<?php

namespace App\Providers;

use App\Repositories\CarRepositoryInterface;
use App\Repositories\Eloquent\CarRepository;
use App\Repositories\Eloquent\MarkRepository;
use App\Repositories\Eloquent\TypeRepository;
use App\Repositories\MarkRepositoryInterface;
use App\Repositories\TypeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
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
        $this->app->bind(MarkRepositoryInterface::class, MarkRepository::class);
        $this->app->bind(TypeRepositoryInterface::class, TypeRepository::class);
        $this->app->bind(CarRepositoryInterface::class, CarRepository::class);
    }
}
