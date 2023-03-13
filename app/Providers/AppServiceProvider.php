<?php

namespace App\Providers;

use App\Repository\Eloquent\PasswordResetTokensRepository;
use App\Repository\Interfaces\PasswordResetTokensInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PasswordResetTokensInterface::class, PasswordResetTokensRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
