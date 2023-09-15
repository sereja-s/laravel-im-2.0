<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
	public function index()
	{
		// (+ч.15: Blade Custom Directive)
		//$orders = Order::where('status', 1)->get();

		// нам нужно получить не все заказы, а только те которые принадлежат пользователю
		// метод: orders() связи с заказами реализован в модели: User.php
		//$orders = Auth::user()->orders()->where('status', 1)->get();
		$orders = Auth::user()->orders()->where('status', 1)->paginate(3);

		return view('auth.orders.index', compact('orders'));
	}

	public function show(Order $order)
	{
		// перед показом заказа проверим, что он принадлежит данному пользователю

		if (!Auth::user()->orders->contains($order)) {

			return back();
		}


		return view('auth.orders.show', compact('order'));
	}
}
