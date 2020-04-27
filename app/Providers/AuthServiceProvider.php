<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
  /**
  * The policy mappings for the application.
  *
  * @var array
  */
  protected $policies = [
    // 'App\Model' => 'App\Policies\ModelPolicy',
  ];

  /**
  * Register any authentication / authorization services.
  *
  * @return void
  */
  public function boot()
  {
    $this->registerPolicies();
  }

  /**
  * Register the polices for any user.
  *
  */
  public function registerPolicies()
  {
    //Gate returns the user's admin attribute (0,1)
    Gate::define('user-admin', function ($user)
    {
      return $user->admin;
    });
  }
}
