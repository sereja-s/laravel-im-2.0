<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// ч.38: Функционал купонов - админка

class CouponRequest extends FormRequest
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
			'code' => 'required|min:6|max:10',
			'value' => 'required',
			// это правило сработает если заполнено(здесь- поставлена галочка) в input c name="type"
			'currency_id' => 'required_with:type',
		];
	}
}
