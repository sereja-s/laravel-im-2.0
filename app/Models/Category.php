<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use HasFactory;

	// поля которые можно заполнять в форме (создания(редактирования) категорий в админке)
	// (+ч.12: Resource Controller, REST, Spoofing)
	protected $fillable = ['code', 'name', 'description', 'image', 'name_en', 'description_en'];

	/** 
	 * Метод реализует связь категории с продуктами
	 */
	public function products()
	{

		return $this->hasMany(Product::class);
	}
}
