<?php

namespace App\Providers;

use App\Repository\Product\ProductRepository;
use App\Repository\Product\ProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        foreach ($this->repositories() as $key => $value) {
            $this->app->bind($value[0], $value[1]);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    private function repositories()
    {
        return [
            'product' => [ProductRepositoryInterface::class, ProductRepository::class],
        ];
    }
}
