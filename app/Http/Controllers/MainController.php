<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFilterRequest;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
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

	public function category($code, Category $request)
	{
		$category = Category::where('code', $code)->first();

		// для использования в шаблоне: category.blade.php получим все продукты соответствующей категории
		//$products = Product::where('category_id', $category->id)->get();

		$productsAll = Product::query()->where('category_id', $category->id)->get();

		return view('category', compact('category', 'productsAll'));
	}

	public function product($category, $productCode)
	{
		// (+ч.22: Кол-во товара, Soft Delete)
		// добавим вызов метода показывать вместе с удалёнными
		// (+ч.24: Отправка Email)
		$product = Product::withTrashed()->where('code', $productCode)->firstOrFail();

		return view('product', compact('product'));
	}


	public function products(ProductsFilterRequest $request)
	{
		// посмотреть все методы класса для указаного объекта
		//dd(get_class_methods($request));

		//dd($request->all());
		//$productsQuery = Product::query();

		// ч.19: Log, Debugbar, Eager Load
		$productsQuery = Product::with('category');

		// Добавим обработку фильтров (+ч.18: Pagination, QueryBuilder, Фильтры): 
		if ($request->filled('min_price')) {

			$productsQuery->where('price', '>=', $request->min_price);
		}

		if ($request->filled('max_price')) {

			$productsQuery->where('price', '<=', $request->max_price);
		}

		foreach (['hit', 'new', 'recommend'] as $field) {

			if ($request->has($field)) {

				$productsQuery->where($field, 1);
			}
		}

		$productsAll = Product::get();
		//$products = Product::paginate(12);

		// Добавим пагинацию, (+ч.18: Pagination, QueryBuilder, Фильтры):
		// метод: withPath() сохраняет строку запрса с фильтрами в адресе при переходе со страницы на страницу		
		$products = $productsQuery->paginate(3)->withPath("?" . $request->getQueryString());

		return view('products', compact('products', 'productsAll'));
	}

	// ч.25: Observer
	public function subscribe(SubscriptionRequest $request, Product $product)
	{
		// Создадим записи таблицы подписки
		Subscription::create([
			'email' => $request->email,
			'product_id' => $product->id,
		]);

		return redirect()->back()->with('success', 'Спасибо, мы сообщим вам о поступлении товара: ' . $product->name);
	}
}
