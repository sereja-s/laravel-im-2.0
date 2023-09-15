<?php

namespace App\Providers;

use App\Models\Product;
use App\Observers\ProductObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// сформируем кастомный if, что бы в шаблонах проверять, авторизован ли пользователь и является ли он администратором (ч.15)
		Blade::if('admin', function () {

			return Auth::check() && Auth::user()->isAdmin();
		});

		// ч.25: Observer
		Product::observe(ProductObserver::class);
	}
}
