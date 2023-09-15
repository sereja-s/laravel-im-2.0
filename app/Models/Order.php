<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	use HasFactory;

	protected $fillable = ['user_id'];

	/** 
	 * Метод реализует связь заказов с продуктами
	 */
	public function products()
	{
		// обращаемся к модели: Product (реализуем связь: многие-ко-многим через связующую таблицу: order_product) 
		// Далее обращаемся к полю связующей таблицы: count (теперь сможем работать с этим полем в контроллере: BasketController)
		// Также укажем что в связующей таблице нужно обновлять поля: created_at, updated_at
		return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
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
		foreach ($this->products()->withTrashed()->get() as $prodct) {

			$sum += $prodct->getPriceForCount();
		}

		return $sum;
	}

	/** 
	 * Метод получает сумму зказа из сессии 
	 * (ч.7: Pivot table)
	 * (+ч.20: Scope, Оптимизация запросов к БД)
	 */
	public static function getFullSum()
	{
		return session('full_order_sum', 0);
	}

	/** 
	 * Метод увеличивает сумму заказа в сессии
	 * (ч.20: Scope, Оптимизация запросов к БД)
	 */
	public static function changeFullSum($changeSum)
	{
		$sum = self::getFullSum() + $changeSum;
		session(['full_order_sum' => $sum]);
	}

	/** 
	 * Метод стирает ячейку с суммой заказа после его оформления
	 * (ч.20: Scope, Оптимизация запросов к БД)
	 */
	public static function eraseOrderSum()
	{
		session()->forget('full_order_sum');
	}

	/** 
	 * Метод сохранения заказа
	 */
	public function saveOrder($name, $phone)
	{
		if ($this->status == 0) {

			// когда заказ найден в БД, необходимо к нему обратиться и обновить его параметры(значения полей таблицы: orders)
			// (эти параметры получим из запроса поданного на вход):
			$this->name = $name;
			$this->phone = $phone;
			$this->status = 1;

			// сохраним заказ с внесёнными изменениями:
			$this->save();

			// затем его нужно удалить из сессии:
			session()->forget('orderId');

			return true;
		} else {

			return false;
		}
	}
}
