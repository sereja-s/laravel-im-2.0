<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;

class BasketIsNotEmpty
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
	 * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
	 */
	public function handle(Request $request, Closure $next)
	{
		// ч.11: Создание Middleware, Auth,  +ч.30: Collection, Объект Eloquent без сохранения
		// Проверим что заказ существует:
		$order = session('order');

		// (+ч.20: Scope, Оптимизация запросов к БД)
		if (!is_null($order) && $order->getFullSum() > 0) {

			// получим этот заказ (если по id заказа ничего не найдёт-вернёт 404)
			//$order = Order::findOrFail($orderId);

			// если в заказе(корзине) нет товаров, то сделаем редирект обратно на ту страницу с которой делали запрос
			// (+ч.15: Blade Custom Directive)
			//if ($order->products->count() > 0) {

			//session()->flash('warning', 'Ваша корзина пуста');
			//return redirect()->route('index');

			return $next($request);
			//}
		}
		session()->forget('order');

		// (+ч.15: Blade Custom Directive)
		session()->flash('warning', 'Ваша корзина пуста');

		return redirect()->route('index');
		//return $next($request);
	}
}
