<?php

namespace App\Providers;

use App\Repository\EloquentSeriesRepository;
use App\Repository\SeriesRepository;
use Illuminate\Support\ServiceProvider;

class SeriesRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SeriesRepository::class, EloquentSeriesRepository::class);
    }
}
