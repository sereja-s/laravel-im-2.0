<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFilterRequest;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Order;
use App\Models\Product;
use App\Models\Sku;
use App\Models\Subscription;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class MainController extends Controller
{
	public function index()
	{
		// (-ч.31: ViewComposer, Collection (map, flatten, take, mapToGroups))
		//$categories = Category::get();



		return view('index');
	}

	public function categories()
	{
		// (-ч.31: ViewComposer, Collection (map, flatten, take, mapToGroups))
		//$categories = Category::get();

		return view('categories');
	}

	public function category($code)
	{
		$category = Category::where('code', $code)->first();

		// для использования в шаблоне: category.blade.php получим все продукты соответствующей категории
		//$products = Product::where('category_id', $category->id)->get();

		$productsAll = Product::query()->where('category_id', $category->id)->get();

		return view('category', compact('category', 'productsAll'));
	}

	/** 
	 * Метод покажет товар(товарное предложение)
	 */
	public function sku($categoryCode, $productCode, Sku $skus)
	{
		// сделаем проверки, что товарное предлложение относится к указанным продукту и категории (+ч.35: Eloquent: whereHas)
		if ($skus->product->code != $productCode) {
			abort(404, 'Product not found');
		}
		if ($skus->product->category->code != $categoryCode) {
			abort(404, 'Category not found');
		}

		// (+ч.22: Кол-во товара, Soft Delete)
		// добавим вызов метода показывать вместе с удалёнными
		// (+ч.24: Отправка Email)
		//$product = Product::withTrashed()->where('code', $productCode)->firstOrFail();

		return view('product', compact('skus'));
	}

	/** 
	 * Метод отобразит все товары(товарные предложения)
	 */
	public function products(ProductsFilterRequest $request)
	{
		// посмотреть все методы класса для указаного объекта
		//dd(get_class_methods($request));

		//dd($request->all());
		//$productsQuery = Product::query();

		// ч.19: Log, Debugbar, Eager Load
		//$productsQuery = Product::with('category');

		// +ч.35: Eloquent: whereHas
		$skusQuery = Sku::query();

		// Добавим обработку фильтров (+ч.18: Pagination, QueryBuilder, Фильтры): 
		//if ($request->filled('min_price')) {
		//
		//	$productsQuery->where('price', '>=', $request->min_price);
		//}
		//
		//if ($request->filled('max_price')) {
		//
		//	$productsQuery->where('price', '<=', $request->max_price);
		//}
		//
		//foreach (['hit', 'new', 'recommend'] as $field) {
		//
		//	if ($request->has($field)) {
		//
		//		$productsQuery->where($field, 1);
		//	}
		//}

		$productsAll = Product::get();
		//$products = Product::paginate(12);

		// Добавим пагинацию, (+ч.18: Pagination, QueryBuilder, Фильтры):
		// метод: withPath() сохраняет строку запрса с фильтрами в адресе при переходе со страницы на страницу		
		//$products = $productsQuery->paginate(3)->withPath("?" . $request->getQueryString());

		//ч.35: Eloquent: whereHas
		$skus = $skusQuery->paginate(5);

		return view('products', compact('skus', 'productsAll'));
	}

	// ч.25: Observer, +ч.35: Eloquent: whereHas
	public function subscribe(SubscriptionRequest $request, Sku $skus)
	{
		// Создадим записи таблицы подписки
		Subscription::create([
			'email' => $request->email,
			'sku_id' => $skus->id,
		]);

		return redirect()->back()->with('success', 'Спасибо, мы сообщим вам о поступлении товара: ' . $skus->name);
	}

	// Laravel: интернет магазин ч.28: Мультивалюта
	public function changeCurrency($currencyCode)
	{
		// здесь- byCode() это вызов public function scopeByCode($query, $code) соответствующей модели

		$currency = Currency::byCode($currencyCode)->firstOrFail();

		session(['currency' => $currency->code]);

		return redirect()->back();
	}
}
