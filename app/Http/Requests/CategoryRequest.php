<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request (ч.14: Валидация, FormRequest)
	 *
	 * @return bool
	 */
	public function authorize()
	{
		// включим валидацию по указанным нами ниже правилам:
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [

			'code' => 'required|min:3|max:255|unique:categories,code',
			'name' => 'required|min:3|max:255|',
			'description' => 'required|min:5',
		];

		// посмотрим какие методы есть у данного класса:
		//dd(get_class_methods($this->route()));

		// применим метод: named(), он проверяет, что данный маршрут называется так, как тот, что передали ему в аргумент(на вход)
		if ($this->route()->named('categories.update')) {

			// добавляем id(приходит из маршрута), для которого уникальность не должна проверяться
			$rules['code'] .= ',' . $this->route()->parameter('category')->id;
		}

		return $rules;
	}

	/** 
	 * Метод переведёт ошибки при заполнении формы на русский язык
	 */
	public function messages()
	{
		return [

			'required' => 'Поле :attribute обязательное для заполнения',
			'min' => 'Поле :attribute должно иметь не менее :min символов',
			// можем указать правило для конкретного поля
			'code.min' => 'Поле код должно содержать не менее :min символов',
		];
	}
}
