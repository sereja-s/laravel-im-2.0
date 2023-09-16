<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
	use HasFactory;

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
		return $this->belongsToMany(PropertyOption::class);
	}
}
