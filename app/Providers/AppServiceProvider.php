<?php

namespace App\Providers;

use App\Repositories\Article\ArticleRepository;
use App\Repositories\Article\ArticleRepositoryInterface;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;

use App\Repositories\ArticleCategory\ArticleCategoryRepository;
use App\Repositories\ArticleCategory\ArticleCategoryRepositoryInterface;

use App\Repositories\Image\ImageRepository;
use App\Repositories\Image\ImageRepositoryInterface;

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
        $this->app->singleton(
            ArticleRepositoryInterface::class,
            ArticleRepository::class
        );
        $this->app->singleton(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
        $this->app->singleton(
            ArticleCategoryRepositoryInterface::class,
            ArticleCategoryRepository::class
        );
        $this->app->singleton(
            ImageRepositoryInterface::class,
            ImageRepository::class
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
