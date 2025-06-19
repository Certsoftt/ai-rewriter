<?php
namespace AIRewriter\Providers;

use Illuminate\Support\ServiceProvider;

class AIRewriterServiceProvider extends ServiceProvider
{
    public function register()
    {
        // ...existing code...
    }

    public function boot()
    {
        // Register the AuthServiceProvider for permissions
        $this->app->register(AIRewriterAuthServiceProvider::class);
        // ...existing code...
    }
}
