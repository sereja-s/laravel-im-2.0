<?php


namespace App\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

// Laravel: интернет магазин ч.31: ViewComposer, Collection (map, flatten, take, mapToGroups)

/** 
 * Класс отвечает за добавление категорий
 */
class CategoriesComposer
{
	public function compose(View $view)
	{
		$categories = Category::get();

		// на вход: 1- какую переменную помещаем(передаём) в шаблон, 2- что помещаем в переменную, переданную в шаблон
		$view->with('categories', $categories);
	}
}
