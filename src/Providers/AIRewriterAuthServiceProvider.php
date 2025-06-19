<?php
namespace AIRewriter\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AIRewriterAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Gate::define('airewriter.approve', function ($user) {
            return $user->hasRole('admin') || $user->hasPermissionTo('airewriter.approve');
        });
        Gate::define('airewriter.edit', function ($user) {
            return $user->hasRole('admin') || $user->hasPermissionTo('airewriter.edit');
        });
        Gate::define('airewriter.batch_rewrite', function ($user) {
            return $user->hasRole('admin') || $user->hasPermissionTo('airewriter.batch_rewrite');
        });
        Gate::define('airewriter.delete', function ($user) {
            return $user->hasRole('admin') || $user->hasPermissionTo('airewriter.delete');
        });
    }
}
