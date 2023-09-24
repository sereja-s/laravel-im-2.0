<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Models\Order;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
	public function basket()
	{
		// (ч.23: Model Injection, new Class)
		$order = (new Basket())->getOrder();

		// идентификатор заказа берём из сессии если заказ там есть:
		//$orderId = session('orderId');

		// (-ч.23: Model Injection, new Class)
		//if (!is_null('orderId')) {

		//$order = Order::findOrFail($orderId);
		//}

		return view('basket', compact('order'));
	}

	/** 
	 * Метод добавления тоаров в корзину
	 * (ч.6: Многие-ко-многим, Сессия)
	 * (+ч.23: Model Injection, new Class) На вход подаём инъекцию через класс: Product
	 * (+ч.35: Eloquent: whereHas)
	 */
	public function basketAdd(Sku $skus)
	{
		$result = (new Basket(true))->addSku($skus);

		/* $orderId = session('orderId');

		if (is_null($orderId)) {

			// cоздадим заказ и положим в сессию
			$order = Order::create();

			session(['orderId' => $order->id]);
		} else {

			$order = Order::findOrFail($orderId);
		} */

		// +ч.7: Pivot table
		// перед добавление продукта проверим есть ли он уже в корзине:
		//if ($order->products->contains($product->id)) {

		// Если товар есть, доберёмся к строке товара в связующей таблице: order_product и увеличим ей значение в поле: count:

		// (если бы обратились просто к products, то работали бы с коллекцией и запрос был бы не SQL-ный)
		// получим данные из таблицы: product для первого продукта в связующей таблице, соответствующего условию

		// В конце указали, что нам нужно добраться до самой строки товара в связующей таблице: order_product
		//$pivotRow = $order->products()->where('product_id', $product->id)->first()->pivot;

		// увеличим значение поля: count товара на 1
		//$pivotRow->count++;
		//$pivotRow->update();
		//} else {

		// найдём товар, используем связующий метод и положим товар в заказ (в связующую таблицу: order_product)
		//$order->products()->attach($product->id);
		//}

		// +ч.11: Создание Middleware, Auth
		// если мы авторизованы, нужно добавить поле: user_id к заказу
		//if (Auth::check()) {

		//$order->user_id = Auth::id();

		// сохраняем заказ с id пользователя, который делал заказ 
		//$order->save();
		//}

		// +ч.8: Request, Flash
		// чтобы добавить сообщение об обуспешном добавлении товара получим эдесь этот продукт(товар) по его id
		// (-ч.23: Model Injection, new Class)
		//$product = Product::find($productId);

		// (+ч.20: Scope, Оптимизация запросов к БД)
		// Увеличиваем стоимость заказа в сессии
		//Order::changeFullSum($product->price);

		// (+ч.23: Model Injection, new Class)
		if ($result) {

			session()->flash('success', 'Товар: ' . $skus->product->name . ' добавлен в корзину');
		} else {

			session()->flash('warning', 'Товар: ' . $skus->product->name . ' в большем количестве не доступен для заказа');
		}

		//session()->flash('success', 'товар: ' . $product->name . ' добавлен в корзину');

		return redirect()->route('basket');
	}

	/** 
	 * Метод удаляет товар из корзины
	 * (ч.7: Pivot table)
	 */
	public function basketRemove(Product $product)
	{
		// (+ч.23: Model Injection, new Class)
		//$basket = (new Basket());
		//$order = $basket->getOrder();

		(new Basket())->removeProduct($product);

		// получим id заказа из сессии
		//$orderId = session('orderId');

		// (-ч.23: Model Injection, new Class)
		/* if (is_null($orderId)) {

			return redirect()->route('basket');
		} */

		// найдём товар в корзине
		// 1) получим корзину:
		//$order = Order::findOrFail($orderId);

		//if ($order->products->contains($product->id)) {

		//$pivotRow = $order->products()->where('product_id', $product->id)->first()->pivot;

		//if ($pivotRow->count < 2) {

		// 2) если товар с таким id есть, то мы его удаляем:
		// (обратимся к товаром из модели: Order через её метод: products())
		//$order->products()->detach($product->id);
		//} else {

		//$pivotRow->count--;

		//$pivotRow->update();
		//}
		//}

		// (+ч.23: Model Injection, new Class)
		//$product = Product::find($productId);

		// (+ч.20: Scope, Оптимизация запросов к БД)
		// Уменьщаем стоимость заказа в сессии
		//Order::changeFullSum(-$product->price);

		session()->flash('warning', 'товар: ' . $product->name . ' удалён из корзины');

		return redirect()->route('basket');
	}

	/** 
	 * Метод оформления заказа
	 * (+ч.8: Request, Flash)
	 */
	public function basketPlace()
	{
		// (+ч.23: Model Injection, new Class)
		$basket = new Basket();

		$order = $basket->getOrder();

		if (!$basket->countAvailable()) {

			session()->flash('warning', 'Товар: не доступен для заказа в полном объёме');
			return redirect()->route('basket');
		}

		//$orderId = session('orderId');

		// (-ч.23: Model Injection, new Class)
		/* if (is_null($orderId)) {

			return redirect()->route('index');
		} */

		//$order = Order::findOrFail($orderId);

		return view('order', compact('order'));
	}

	/** 
	 * Метод потверждения(сохранения) заказа
	 * На вход: HTTP-запрос с данными из формы (при назатии на кнопку: сделать заказ)
	 * (ч.8: Request, Flash)
	 */
	public function basketConfirm(Request $request)
	{
		//$orderId = session('orderId');

		// (-ч.23: Model Injection, new Class)
		/* if (is_null($orderId)) {

			return redirect()->route('index');
		} */

		//$order = Order::findOrFail($orderId);

		// когда заказ найден в БД, необходимо к нему обратиться и обновить его параметры(значения полей таблицы: orders)
		// (эти параметры получим из запроса поданного на вход):
		//dd($request->all());
		//$order->name = $request->name;
		//$order->phone = $request->phone;
		//$order->status = 1;

		// сохраним заказ с внесёнными изменениями:
		//$order->save();

		// (+ч.23: Model Injection, new Class)
		//$order = (new Basket())->getOrder();

		// весь описанный функционал перенесли в модель: Order
		//$success = $order->saveOrder($request->name, $request->phone);

		// (+ч.24: Отправка Email)
		$email = Auth::check() ? Auth::user()->email : $request->email;

		// (+ч.23: Model Injection, new Class)
		if ((new Basket())->saveOrder($request->name, $request->phone, $email)) {

			// для показа сообщений используем функционал Flash (переменные внутри сессии, которые позволяют опсле первого отображения их удалять)
			session()->flash('success', 'Ваш заказ принят в обработку');
		} else {

			session()->flash('warning', 'Ошибка при формировании заказа');
		}

		// затем его нужно удалить из сессии:
		//session()->forget('orderId');

		// ч.20: Scope, Оптимизация запросов к БД
		Order::eraseOrderSum();

		return redirect()->route('index');
	}
}
