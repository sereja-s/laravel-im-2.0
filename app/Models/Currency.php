<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Laravel: интернет магазин ч.28: Мультивалюта

class Currency extends Model
{
	use HasFactory;

	protected $fillable = ['rate'];

	public function scopeByCode($query, $code)
	{
		return $query->where('code', $code);
	}

	/*** 
	 * Метод показывает, что валюта является базовой
	 * (+ ч.29: Запросы к внешнему сервису, Guzzle)
	 */
	public function isMain()
	{
		return $this->is_main === 1;
	}
}
