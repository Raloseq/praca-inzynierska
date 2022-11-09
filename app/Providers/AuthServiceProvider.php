<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Car' => 'App\Policies\CarPolicy',
        'App\Models\ClientAddress' => 'App\Policies\ClientAddressPolicy',
        'App\Models\Clients' => 'App\Policies\ClientsPolicy',
        'App\Models\Employee' => 'App\Policies\EmployeePolicy',
        'App\Models\ServiceOrders' => 'App\Policies\ServiceOrderPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
