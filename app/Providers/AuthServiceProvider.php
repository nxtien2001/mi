<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Student;
use App\Models\Team;
use App\Policies\CarPolicy;
use App\Policies\StudentPolicy;
use App\Policies\TeamPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        Student::class => StudentPolicy::class,
        Cart::class => CarPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('list-student', function ($user) {
            return false;
        });
        Gate::define('admin', function ($user) {
            return $user->role === 1;
        });
        Gate::define('user', function ($user) {
            return $user->role === 0;
        });
        // super admin
        // Gate::before(function ($user) {
        //     if ($user->role === 1) {
        //         return true;
        //     }
        // });
    }
}
