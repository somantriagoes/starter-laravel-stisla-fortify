<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    // public static $permission = [
    //     'dashboard' => ['superadmin', 'admin'],
    //     'index-user' => ['superadmin', 'admin'],
    //     'index-categories' => ['superadmin', 'admin', 'user'],
    // ];

    // use Gate::before()
    public static $permission = [
        'dashboard' => ['admin'],
        'index-user' => ['admin'],
        'index-categories' => ['admin', 'user'],
    ];

    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();

        Gate::before(function (User $user) {
            if($user->role == 'superadmin') {
                return true;
            }
        });

        // Gate::define('dashboard', function(User $user) {
        //     if($user->role == 'superadmin' || $user->role == 'admin') {
        //         return true;
        //     }
        // });

        foreach(self::$permission as $content => $roles) {
            Gate::define($content, function(User $user) use ($roles) {
                if(in_array($user->role, $roles )) {
                    return true;
                }
            });
        }

    }
}
