<?php

namespace App\Classes;

use App\Mail\OrderCreated;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

// (ч.23: Model Injection, new Class)

class Basket
{
	protected $order;

	// На вход конструктору передаём флаг
	public function __construct($createOrder = false)
	{
		$orderId = session('orderId');

		if (is_null($orderId) && $createOrder) {

			$data = [];

			// если мы авторизованы, нужно добавить поле: user_id к заказу
			if (Auth::check()) {

				$data['user_id'] = Auth::id();

				//$this->order->user_id = Auth::id();

				// сохраняем заказ с id пользователя, который делал заказ
				//$this->order->save();
			}

			$this->order = Order::create($data);

			session(['orderId' => $this->order->id]);
		} else {

			$this->order = Order::findOrFail($orderId);
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

		// перед сохранением заказа отправим сообщение о нём (ч.24: Отправка Email)
		// при создании нового объекта класса, указали параметры которые хотим передать в его метод-конструктор
		// $this - это объект корзина (в ней вся информация о заказе) и для него получаем текущий заказ
		Mail::to($email)->send(new OrderCreated($name, $this->getOrder()));

		return $this->order->saveOrder($name, $phone);
	}

	/** 
	 * Метод добавляет продукт
	 */
	public function addProduct(Product $product)
	{
		// перед добавление продукта проверим есть ли он(его id) уже в корзине:
		if ($this->order->products->contains($product->id)) {

			// Если товар есть, доберёмся к строке товара в связующей таблице: order_product и увеличим ей значение в поле: count:

			// (если бы обратились просто к products, то работали бы с коллекцией и запрос был бы не SQL-ный)
			// получим данные из таблицы: product для первого продукта в связующей таблице, соответствующего условию

			// В конце указали, что нам нужно добраться до самой строки товара в связующей таблице: order_product
			$pivotRow = $this->order->products()->where('product_id', $product->id)->first()->pivot;

			$pivotRow->count++;

			// (+ч.23: Model Injection, new Class)
			if ($pivotRow->count > $product->count) {

				return false;
			}

			$pivotRow->update();
		} else {

			if ($product->count == 0) {

				return false;
			}

			// положим товар в заказ (в связующую таблицу: order_product)
			$this->order->products()->attach($product->id);
		}

		// если мы авторизованы, нужно добавить поле: user_id к заказу
		//if (Auth::check()) {
		//	$this->order->user_id = Auth::id();

		// сохраняем заказ с id пользователя, который делал заказ
		//$this->order->save();
		//}

		Order::changeFullSum($product->price);

		return true;
	}

	/** 
	 * Метод удаляет продукт
	 */
	public function removeProduct(Product $product)
	{
		if ($this->order->products->contains($product->id)) {

			$pivotRow = $this->order->products()->where('product_id', $product->id)->first()->pivot;

			if ($pivotRow->count < 2) {

				$this->order->products()->detach($product->id);
			} else {

				$pivotRow->count--;
				$pivotRow->update();
			}
		}

		Order::changeFullSum(-$product->price);
	}

	/** 
	 * Метод проверяет доступен ли товар для заказа
	 * (+ч.24: Отправка Email)
	 */
	public function countAvailable($updateCount = false)
	{
		foreach ($this->order->products as $orderProduct) {

			if ($orderProduct->count < $this->getPivotRow($orderProduct)->count) {

				return false;
			}

			// если весь товар заказан, то он должен стать недоступным на сайте
			if ($updateCount) {

				$orderProduct->count -= $this->getPivotRow($orderProduct)->count;
			}
		}

		if ($updateCount) {
			// обновим количество товара
			// Метод map() перебирает коллекцию (здесь используем его как свойство)
			$this->order->products->map->save();
		}

		return true;
	}

	protected function getPivotRow($product)
	{

		return $this->order->products()->where('product_id', $product->id)->first()->pivot;
	}
}
