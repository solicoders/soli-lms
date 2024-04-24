<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $migrationsPath = database_path('migrations');
        $paths = $this->getAllSubdirectoriesOptimized($migrationsPath);

        $this->loadMigrationsFrom($paths);
        Paginator::useBootstrap();
    }

    /**
     * Recursively get all subdirectories under a given directory.
     *
     * @param string $dir The directory path.
     * @return array An array of subdirectory paths.
     */
    function getAllSubdirectoriesOptimized($dir)
    {
        $subdirectories = [];

        $items = scandir($dir);

        foreach ($items as $item) {
            if ($item !== '.' && $item !== '..') {
                $path = $dir . DIRECTORY_SEPARATOR . $item;
                if (is_dir($path)) {
                    $subdirectories[] = $path;
                    $subdirectoriesToAdd = $this->getAllSubdirectoriesOptimized($path);
                    foreach ($subdirectoriesToAdd as $subdirToAdd) {
                        $subdirectories[] = $subdirToAdd;
                    }
                }
            }
        }

        return $subdirectories;
    }
}