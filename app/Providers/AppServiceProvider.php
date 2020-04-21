<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use Gate;

class AppServiceProvider extends ServiceProvider
{

  /**
  * Bootstrap any application services.
  *
  * @return void
  */
  public function boot()
  {
    $this->registerPolicies();
  }

  /**
  * Register any application services.
  *
  * @return void
  */
  public function register()
  {
    //
  }

  /**
  * Register the polices for any user.
  *
  * @return true if adim else false
  */
  public function registerPolicies()
  {
    Gate::define('displayall', function ($user)
    {
      return $user->admin;
    });
  }
}
