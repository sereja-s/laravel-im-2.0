<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use HasFactory;
	use SoftDeletes;

	// добавляем поля что бы могли их редактировать
	protected $fillable = [
		'name', 'code', 'price', 'category_id', 'description', 'image', 'hit', 'new', 'recommend', 'count', 'name_en',
		'description_en', 'count',
	];

	public function getCategory()
	{
		// получаем все записи таблицы: Категории
		$categories = Category::where('id', $this->category_id)->get();


		// получаем одну запись таблицы: Категории:

		//$category = Category::where('id', $this->category_id)->first();

		// тоже самое можно записать так и сразу вернуть результат:
		return Category::find($this->category_id);
	}

	//====================================================================================================================//

	/** 
	 * Метод вернёт категорию товара (связь)
	 */
	public function category()
	{

		return $this->belongsTo(Category::class);
	}

	/** 
	 * Метод пересчитает общую цену за товар в корзине при изменении его кол-ва
	 * (+ч.7: Pivot table)
	 */
	public function getPriceForCount()
	{
		if (!is_null($this->pivot)) {

			return $this->pivot->count * $this->price;
		}

		return $this->price;
	}


	// ч.17: Checkbox, Mutator 
	/** 
	 * Метод-Mutator вызывается перед сохранением атрибута товара: new
	 */
	public function setNewAttribute($value)
	{
		$this->attributes['new'] = $value === 'on' ? 1 : 0;
	}
	/** 
	 * Метод-Mutator вызывается перед сохранением атрибута товара: hit
	 */
	public function setHitAttribute($value)
	{
		$this->attributes['hit'] = $value === 'on' ? 1 : 0;
	}
	/** 
	 * Метод-Mutator вызывается перед сохранением атрибута товара: recommend
	 */
	public function setRecommendAttribute($value)
	{
		$this->attributes['recommend'] = $value === 'on' ? 1 : 0;
	}


	// ч.17: Checkbox, Mutator
	// методы вернут true если значение соответствующего поля равно 1
	public function isHit()
	{
		return $this->hit === 1;
	}
	public function isNew()
	{
		return $this->new === 1;
	}
	public function isRecommend()
	{
		return $this->recommend === 1;
	}

	/** 
	 * Метод покажет, что товар доступен для заказа
	 * (ч.22: Кол-во товара, Soft Delete)
	 */
	public function isAvailable()
	{
		// указали что товар должен быть не удалён(скрыт) и его кол-во больше 0
		return !$this->trashed() && $this->count > 0;
	}
}
