<?php

namespace App\Providers;

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
		View::composer(['index'], 'App\ViewComposers\BestProductsComposer');
	}
}
