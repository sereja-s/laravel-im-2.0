<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	use HasFactory;

	protected $fillable = ['user_id', 'currency_id', 'sum'];

	/** 
	 * Метод реализует связь заказов с продуктами
	 */
	//public function products()
	//{
	// обращаемся к модели: Product (реализуем связь: многие-ко-многим через связующую таблицу: order_product) 
	// Далее обращаемся к полю связующей таблицы: count (теперь сможем работать с этим полем в контроллере: BasketController)
	// Также укажем что в связующей таблице нужно обновлять поля: created_at, updated_at
	//return $this->belongsToMany(Product::class)->withPivot(['count', 'price'])->withTimestamps();
	//}

	// Laravel: интернет магазин ч.35: Eloquent: whereHas
	/** 
	 * Метод возвращает все товарные предложения, которые были заказаны (связь заказа с торговыми предложениями)
	 */
	public function skus()
	{
		return $this->belongsToMany(Sku::class)->withPivot(['count', 'price'])->withTimestamps();
	}

	/** 
	 * Метод реализует связь заказа с выбранным(текущим) символом валюты
	 */
	public function currency()
	{
		return $this->belongsTo(Currency::class);
	}

	/** 
	 * Метод реализует связь заказa с пользователем
	 * (ч.10: Middleware Авторизации)
	 */
	/* public function user()
	{
		return $this->belongsTo(User::class);
	} */

	/** 
	 * Метод вернёт полную стоимость заказа в корзине за все продукты
	 * (ч.20: Scope, Оптимизация запросов к БД)
	 */
	public function calculateFullSum()
	{
		$sum = 0;

		// (+ч.22: Кол-во товара, Soft Delete)
		foreach ($this->skus()->withTrashed()->get() as $sku) {

			$sum += $sku->getPriceForCount();
		}

		return $sum;
	}

	/** 
	 * Метод получает сумму зказа из сессии 
	 * (ч.7: Pivot table)
	 * (+ч.20: Scope, Оптимизация запросов к БД)
	 */
	public function getFullSum()
	{
		// +ч.30: Collection, Объект Eloquent без сохранения
		$sum = 0;

		// Laravel: интернет магазин ч.35: Eloquent: whereHas
		foreach ($this->skus as $sku) {
			$sum += $sku->price * $sku->countInOrder;
		}

		return $sum;
	}

	/** 
	 * Метод увеличивает сумму заказа в сессии
	 * (ч.20: Scope, Оптимизация запросов к БД, -ч.30: Collection, Объект Eloquent без сохранения)
	 */
	/* public static function changeFullSum($changeSum)
	{
		$sum = self::getFullSum() + $changeSum;
		session(['full_order_sum' => $sum]);
	} */

	/** 
	 * Метод стирает ячейку с суммой заказа после его оформления
	 * (ч.20: Scope, Оптимизация запросов к БД, -ч.30: Collection, Объект Eloquent без сохранения)
	 */
	/* public static function eraseOrderSum()
	{
		session()->forget('full_order_sum');
	} */

	/** 
	 * Метод сохранения заказа
	 */
	public function saveOrder($name, $phone)
	{
		// -ч.30: Collection, Объект Eloquent без сохранения
		//if ($this->status == 0) {

		// когда заказ найден в БД, необходимо к нему обратиться и обновить его параметры(значения полей таблицы: orders)
		// (эти параметры получим из запроса поданного на вход):
		$this->name = $name;
		$this->phone = $phone;
		$this->status = 1;

		// +ч.30: Collection, Объект Eloquent без сохранения
		$this->sum = $this->getFullSum();

		$skus = $this->skus;
		// сохраним заказ с внесёнными изменениями:
		$this->save();

		// добавим те продукты которые сохранили
		foreach ($skus as $skuInOrder) {
			$this->skus()->attach($skuInOrder, [
				'count' => $skuInOrder->countInOrder,
				'price' => $skuInOrder->price,
			]);
		}

		// затем его нужно удалить из сессии:
		session()->forget('order');

		return true;
		/* } else {

			return false;
		} */
	}
}
