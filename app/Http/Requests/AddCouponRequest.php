<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// ч.39: Функционал купонов - реализация корзины

class AddCouponRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			// в конце указали, что купон должен находиться в таблице: coupons, в поле: code
			'coupon' => 'required|min:6|max:10|exists:coupons,code',
		];
	}

	public function messages()
	{
		return [
			// звёздочка показывает, что указанное сообщение будет выводиться при несоблюдении всех правил описанных выше
			'coupon.*' => 'такого купона не существует',
		];
	}
}
