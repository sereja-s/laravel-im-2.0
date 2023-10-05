<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sku;
use Illuminate\Http\Request;

//ч.40: RouteServiceProvider, response JSON

class SkusController extends Controller
{
	public function getSkus()
	{
		//$skus = Sku::available()->get()->toArray();

		//return response()->json($skus);
		// достанем все товарные предложения (с подгрузкой продуктов из соответствующей таблицы) и отфильтруем их
		return Sku::with('product')
			->available()
			->get()
			// в метод на вход передаём название атрибута, которое хотим получить в выборке (название продуктов)
			// (этот атрибут получаем в модели в методе: getProductNameAttribute())
			->append('product_name');
	}
}
