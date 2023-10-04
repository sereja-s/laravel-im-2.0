<?php

namespace App\Models;

use App\Services\CurrencyConversion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// ч.38: Функционал купонов - админка

class Coupon extends Model
{
	use HasFactory;

	// поля которые можно заполнять в форме
	protected $fillable = ['code', 'value', 'type', 'currency_id', 'only_once', 'expired_at', 'description'];

	// описали свойство, чтобы можно было форматировать дату
	protected $dates = ['expired_at'];

	/** 
	 * Метод реализует связь купона с заказом
	 */
	public function orders()
	{
		return $this->hasMany(Order::class);
	}

	/** 
	 * Связь купона с валютой
	 */
	public function currency()
	{
		return $this->belongsTo(Currency::class);
	}

	// Методы соответствующих проверок (используем в шаблоне купона: show):

	public function isAbsolute()
	{
		return $this->type === 1;
	}

	public function isOnlyOnce()
	{
		return $this->only_once === 1;
	}

	/** 
	 * Метод определяет можно ли добавить купон (проверяет доступен ли он)
	 * (ч.39: Функционал купонов - реализация корзины)
	 */
	public function availableForUse()
	{
		// получим актуальные данные по купону из БД (запись там могла обновиться)
		$this->refresh();

		// проверяем, что купон можно использовать не один раз или по нему ещё не было заказов
		if (!$this->isOnlyOnce() || $this->orders->count() === 0) {

			// проверим что конечная дата использования в купоне не указана или не просрочена
			return is_null($this->expired_at) || $this->expired_at->gte(Carbon::now());
		}
		return false;
	}

	/** 
	 * Метод расчитает стоимость заказа с купоном в зависимости от того номинал купона в абсолютных единицах(здесь-рубли) или в процентах
	 * (ч.39: Функционал купонов - реализация корзины)
	 */
	public function applyCost($price, Currency $currency = null)
	{
		if ($this->isAbsolute()) {
			// здесь value- значение величины(номинал) купона
			return $price - CurrencyConversion::convert($this->value, $this->currency->code, $currency->code);
		} else {
			return round(($price - ($price * $this->value / 100)));
		}
	}
}
