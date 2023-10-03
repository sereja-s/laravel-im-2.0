<?php

namespace App\Models;

use App\Services\CurrencyConversion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sku extends Model
{
	use HasFactory;
	use SoftDeletes;

	// ч.32: Товарные предложения
	protected $fillable = ['product_id', 'count', 'price'];

	/** 
	 * Метод реализующий связь товарного предложения с продуктом
	 */
	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	/** 
	 * Метод реализует связь товарного предложения с набором значений свойств товара
	 */
	public function propertyOptions()
	{
		// вторым параметром передаём название соответствующей таблицы связи в БД (иначе по умолчанию требует: property_option_sku)
		return $this->belongsToMany(PropertyOption::class, 'sku_property_option')->withTimestamps();
	}

	/** 
	 * Метод покажет, что товар доступен для заказа
	 * (ч.22: Кол-во товара, Soft Delete, +ч.35: Eloquent: whereHas)
	 */
	public function isAvailable()
	{
		// указали что товар должен быть не удалён(скрыт) и его кол-во больше 0
		return !$this->product->trashed() && $this->count > 0;
	}

	/** 
	 * Метод пересчитает общую цену за товар в корзине при изменении его кол-ва
	 * (+ч.7: Pivot table, +ч.35: Eloquent: whereHas)
	 */
	public function getPriceForCount()
	{
		if (!is_null($this->pivot)) {

			return $this->pivot->count * $this->price;
		}

		return $this->price;
	}

	/** 
	 * Метод устанавливает выбранный символ валюты в ценах (ч.28: Мультивалюта)
	 */
	public function getPriceAttribute($value)
	{
		return round(CurrencyConversion::convert($value), 2);
	}

	public function getProductNameAttribute()
	{
		return $this->product->name;
	}
}
