<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
	use HasFactory;
	use SoftDeletes;

	// ч.32: Товарные предложения
	protected $fillable = ['name'];

	/** 
	 * Метод реализует связь свойств товара с наборами значений(вариантами) этих свойств
	 * (ч.32: Товарные предложения.)
	 */
	public function propertyOptions()
	{
		return $this->hasMany(PropertyOption::class);
	}

	/** 
	 * Метод реализует связь свойства с продуктами
	 */
	public function products()
	{
		return $this->belongsToMany(Product::class);
	}
}
