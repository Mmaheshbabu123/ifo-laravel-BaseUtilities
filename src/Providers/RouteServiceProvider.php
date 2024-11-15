<?php

namespace Packages\IfoBaseUtilities\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
  /**
   * The module namespace to assume when generating URLs to actions.
   *
   * @var string
   */
  protected $moduleNamespace = 'Packages\IfoBaseUtilities\Http\Controllers';

  protected  $moduleName = 'IfoBaseUtilities';


  /**
   * Called before routes are registered.
   *
   * Register any model bindings or pattern-based filters.
   *
   * @return void
   */
  public function boot()
  {
    parent::boot();
  }
}
