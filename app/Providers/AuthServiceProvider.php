<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Super Admin
        Gate::before(function ($user) {
            return $user->hasRole(Role::ROLE_SUPER_ADMIN) ? true : null;
        });

        //Mange Role
        Gate::define('manage-role', function (User $user) {
            if ($user->hasPermissionTo(Permission::PERMISSION_MANAGE_ROLE)) return true;
            return null;
        });

        //Reset Password
        ResetPassword::createUrlUsing(function ($user, string $token) {
            return env('SPA_URL') . '/auth/reset-password?token=' . $token;
        });
    }
}
