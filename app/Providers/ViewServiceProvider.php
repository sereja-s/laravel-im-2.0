<?php

namespace App\Providers;

use App\Services\CurrencyConversion;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

// ч.31: ViewComposer, Collection (map, flatten, take, mapToGroups)
class ViewServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap services.
	 * 
	 * (подключение других файлов)
	 *
	 * @return void
	 */
	public function boot()
	{
		// добавим категории для всех страниц в указанных шаблонах
		// 1-ый параметр это шаблоны (здесь- layouts.master и categories)
		// 2-ой параметр показыввает какой класс используем
		View::composer(['layouts.master', 'categories'], 'App\ViewComposers\CategoriesComposer');

		// +ч.31: ViewComposer, Collection (map, flatten, take, mapToGroups)
		View::composer(['layouts.master'], 'App\ViewComposers\CurrenciesComposer');

		View::composer(['layouts.master', 'index'], 'App\ViewComposers\BestProductsComposer');

		// для всех шаблонов (+ч.31: ViewComposer, Collection (map, flatten, take, mapToGroups))
		View::composer('*', function ($view) {
			$currencySymbol = CurrencyConversion::getCurrencySymbol();
			$view->with('currencySymbol', $currencySymbol);
		});
	}
}
