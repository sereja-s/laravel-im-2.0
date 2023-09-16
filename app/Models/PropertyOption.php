<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyOption extends Model
{
	use HasFactory;
	use SoftDeletes;

	// ч.32: Товарные предложения.
	protected $fillable = ['property_id', 'name'];

	/** 
	 * Метод реализует связь набора значений свойств товара со свойствами
	 */
	public function property()
	{
		$this->belongsTo(Property::class);
	}

	/** 
	 * Метод реализует связь набора значений свойств товара с товарными предложениями
	 */
	public function skus()
	{
		return $this->belongsToMany(Sku::class);
	}
}
