<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use League\CommonMark\Node\Query\OrExpr;

class OrderController extends Controller

{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 * 
	 * (ч.10: Middleware Авторизации)
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		//$orders = Order::get()->where('status', 1);
		$orders = Order::where('status', 1)->paginate(3);

		return view('auth.orders.index', compact('orders'));
	}

	/** 
	 * Метод покажет таблицу одного заказа
	 * (+ч.15: Blade Custom Directive)
	 */
	public function show(Order $order)
	{
		// чтобы получить в заказе продукты скрытые после удаления (с применением трейта Soft Delete) достроим запрос 
		//(добавляем скобки к св-ву котрому обращаемся) и затем вызываем метод: withTrashed() и затем метод: get()
		// (+ч.22: Кол-во товара, Soft Delete)
		//$products = $order->products()->withTrashed()->get();

		// +ч.35: Eloquent: whereHas
		$skus = $order->skus()->withTrashed()->get();

		return view('auth.orders.show', compact('order', 'skus'));
	}
}
