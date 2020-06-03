<?php

namespace App\Providers;

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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1,2]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1,2]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });
		

        // Auth gates for: Salles
        Gate::define('salle_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('salle_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('salle_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('salle_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('salle_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

         // Auth gates for: Prix management
         Gate::define('prix_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        
        // Auth gates for: Prix
        Gate::define('prix_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('prix_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('prix_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('prix_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('prix_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Timing
        Gate::define('timing_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('timing_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('timing_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('timing_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('timing_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Type
        Gate::define('type_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('type_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('type_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('type_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('type_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Appointments
        Gate::define('appointment_access', function ($user) {
            return in_array($user->role_id, [1,2]);
        });
        Gate::define('appointment_create', function ($user) {
            return in_array($user->role_id, [1,2]);
        });
        Gate::define('appointment_edit', function ($user, $appointment) {
            return (in_array($user->role_id, [1]) || ($user->id == $appointment->user_id));
        });
        Gate::define('appointment_view', function ($user) {
            return in_array($user->role_id, [1,2]);
        });
        Gate::define('appointment_delete', function ($user, $appointment) {
            return (in_array($user->role_id, [1]) || ($user->id == $appointment->user_id));
        });

        Gate::define('appointment_mass', function ($user) {
            return in_array($user->role_id, [1]);
        });


        // Auth gates for: Demandes
        Gate::define('demande_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('demande_confirm', function ($user) {
            return in_array($user->role_id, [1]);
        });
    }
}
