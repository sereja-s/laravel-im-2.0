<?php

namespace App\Classes;

use App\Mail\OrderCreated;
use App\Models\Order;
use App\Models\Product;
use App\Models\Sku;
use App\Services\CurrencyConversion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

// (ч.23: Model Injection, new Class)

class Basket
{
	protected $order;

	// На вход конструктору передаём флаг
	public function __construct($createOrder = false)
	{
		// +ч.30: Collection, Объект Eloquent без сохранения
		// полученный заказ будем держать в сессии
		$order = session('order');

		// если заказа в сессии ещё нет и приходит флаг: создать заказ
		if (is_null($order) && $createOrder) {

			$data = [];

			// если мы авторизованы, нужно добавить поле: user_id к заказу
			if (Auth::check()) {

				$data['user_id'] = Auth::id();

				//$this->order->user_id = Auth::id();

				// сохраняем заказ с id пользователя, который делал заказ
				//$this->order->save();
			}

			// +ч.30: Collection, Объект Eloquent без сохранения
			$data['currency_id'] = CurrencyConversion::getCurrentCurrencyFromSession()->id;

			//$this->order = Order::create($data);
			$this->order = new Order($data);

			session(['order' => $this->order]);
		} else {

			//$this->order = Order::findOrFail($orderId);
			// ч.30: Collection, Объект Eloquent без сохранения
			$this->order = $order;
		}
	}

	/** 
	 * Опишем геттер для заказа
	 */
	public function getOrder()
	{
		return $this->order;
	}

	/** 
	 * Метод сохранения заказа в корзине (использует одноимённый метод из модели: Order)
	 */
	public function saveOrder($name, $phone, $email)
	{
		// (+ч.23: Model Injection, new Class)
		if (!$this->countAvailable(true)) {

			return false;
		}

		// +ч.30: Collection, Объект Eloquent без сохранения
		return $this->order->saveOrder($name, $phone);

		// перед сохранением заказа отправим сообщение о нём (ч.24: Отправка Email)
		// при создании нового объекта класса, указали параметры которые хотим передать в его метод-конструктор
		// $this - это объект корзина (в ней вся информация о заказе) и для него получаем текущий заказ
		Mail::to($email)->send(new OrderCreated($name, $this->getOrder()));

		return true;
	}

	/** 
	 * Метод добавляет продукт
	 * (+ч.35: Eloquent: whereHas)
	 */
	public function addSku(Sku $skus)
	{
		// перед добавление продукта проверим есть ли он(его id) уже в корзине:
		if ($this->order->skus->contains($skus)) {

			// Если товар есть, доберёмся к строке товара в связующей таблице: order_product и увеличим ей значение в поле: count:

			// (если бы обратились просто к products, то работали бы с коллекцией и запрос был бы не SQL-ный)
			// получим данные из таблицы: product для первого продукта в связующей таблице, соответствующего условию

			// В конце указали, что нам нужно добраться до самой строки товара в связующей таблице: order_product
			$pivotRow = $this->order->skus->where('id', $skus->id)->first();

			// проверяем, что кол-во добавленное в корзину больше чем доступное
			if ($pivotRow->countInOrder >= $skus->count) {
				return false;
			}

			$pivotRow->countInOrder++;

			// (+ч.23: Model Injection, new Class) 
			/* if ($pivotRow->count > $skus->count) {

				return false;
			}

			$pivotRow->update(); */
		} else {
			if ($skus->count == 0) {

				return false;
			}

			$skus->countInOrder = 1;
			$this->order->skus->push($skus);

			// положим товар в заказ (в связующую таблицу: order_product(здесь- order_xku))			
			//$this->order->skus()->attach($skus->id);

			// используем коллекцию
			$this->order->skus->push($skus);
		}

		// если мы авторизованы, нужно добавить поле: user_id к заказу
		//if (Auth::check()) {
		//	$this->order->user_id = Auth::id();

		// сохраняем заказ с id пользователя, который делал заказ
		//$this->order->save();
		//}

		// (-ч.30: Collection, Объект Eloquent без сохранения)
		// Order::changeFullSum($skus->price);

		return true;
	}

	/** 
	 * Метод удаляет продукт
	 * (+ч.35: Eloquent: whereHas)
	 */
	public function removeSku(Sku $sku)
	{
		// Laravel: интернет магазин ч.30: Collection, Объект Eloquent без сохранения
		if ($this->order->skus->contains($sku)) {

			$pivotRow = $this->order->skus->where('id', $sku->id)->first();

			if ($pivotRow->countInOrder < 2) {

				$this->order->skus->pop($sku);
			} else {

				$pivotRow->countInOrder--;
			}
		}
	}

	/** 
	 * Метод проверяет доступен ли товар для заказа
	 * (в параметры добавляем флаг (позволит сделать товар недоступным если кто то уже добавил его в корзину и он закончился))
	 * (+ч.24: Отправка Email)
	 */
	public function countAvailable($updateCount = false)
	{
		/* foreach ($this->order->products as $orderProduct) {

			if ($orderProduct->count < $this->getPivotRow($orderProduct)->count) {

				return false;
			} */

		// Laravel: интернет магазин +ч.35: Eloquent: whereHas
		// используем коллекцию, чтобы накопить товары
		$skus = collect([]);

		foreach ($this->order->skus as $orderSku) {

			$sku = Sku::find($orderSku->id);

			if ($orderSku->countInOrder > $sku->count) {
				return false;
			}

			// если весь товар заказан, то он должен стать недоступным на сайте(+ч.24: Отправка Email)
			/* if ($updateCount) {

				$orderProduct->count -= $this->getPivotRow($orderProduct)->count;
			} */
			if ($updateCount) {

				$sku->count -= $orderSku->countInOrder;

				$skus->push($sku);
			}
		}

		if ($updateCount) {
			// обновим количество товара
			// Метод map() перебирает коллекцию (здесь используем его как свойство)
			//$this->order->products->map->save();
			$skus->map->save();
		}

		return true;
	}

	// (-ч.30: Collection, Объект Eloquent без сохранения)
	/* 	protected function getPivotRow($product)
	{
		return $this->order->products()->where('product_id', $product->id)->first()->pivot;
	} */
}
