<?php

namespace Arafat\LaravelRepository;

use Arafat\LaravelRepository\Commands\RepositoryCommand;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerCommands();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerPublishables();
        // $this->checkDirectoryAndRepository();
    }

    protected function checkDirectoryAndRepository()
    {
        $directory = app_path('Repositories');
        if (!is_dir($directory)) {
            mkdir($directory);
        }

        $repositoryPath = app_path("Repositories/Repository.php");
        if (!file_exists($repositoryPath)) {
            $content = file_get_contents(__DIR__ . '/Repository.php');
            file_put_contents($repositoryPath, $content);
        }
    }

    protected function registerPublishables(): void
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__ . '/../stubs/repository.stub' => base_path('stubs/repository.stub'),
            __DIR__ . '/../stubs/repository.model.stub' => base_path('stubs/repository.model.stub'),
        ], 'stubs');
    }

    protected function  registerCommands(): void
    {
        $this->app->bind('command.make:repository', RepositoryCommand::class);
        $this->commands(['command.make:repository']);
    }
}
