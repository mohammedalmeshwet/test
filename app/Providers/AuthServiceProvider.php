<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];


    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function(User $user){
            return ( $user->role == 'admin' )
                                            ? Response::allow()
                                            : Response::deny('You must be an admin.');
        });

        Gate::define('isUser', function(User $user){
            return ($user->role  == 'user' )
                                            ?Response::allow()
                                            : Response::deny('You must be an user.');
        });
    }
}
