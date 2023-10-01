<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//$products = Product::get();
		$products = Product::paginate(10);

		return view('auth.products.index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$categories = Category::get();

		// выбираем все свойства для показа в форме редактирования(создания) товара (+ч.34: Plural & Singular)
		$properties = Property::get();

		return view('auth.products.form', compact('categories', 'properties'));
	}

	/**
	 * Метод сохраняет созданные в админке товары
	 * (+ч.14: Валидация, FormRequest)
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ProductRequest $request)
	{
		// (+ч.13: Storage)
		//$path = $request->file('image')->store('products');

		$params = $request->all();

		unset($params['image']);

		if ($request->has('image')) {

			$params['image'] = $request->file('image')->store('products');
		}
		//$params['image'] = $path;

		// (+ч.17: Checkbox, Mutator)
		/* foreach (['new', 'hit', 'recommend'] as $fieldName) {

			if (isset($params[$fieldName])) {

				$params[$fieldName] = 1;
			}
		} */

		Product::create($params);

		return redirect()->route('products.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function show(Product $product)
	{
		return view('auth.products.show', compact('product'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Product $product)
	{
		$categories = Category::get();

		// выбираем все свойства для показа в форме редактирования(создания) товара (+ч.34: Plural & Singular)
		$properties = Property::get();

		return view('auth.products.form', compact('product', 'categories', 'properties'));
	}

	/**
	 * Update the specified resource in storage.
	 * (+ч.14: Валидация, FormRequest)
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function update(ProductRequest $request, Product $product)
	{
		// (+ч.13: Storage)
		//Storage::delete($product->image);
		//$path = $request->file('image')->store('products');

		$params = $request->all();

		unset($params['image']);

		if ($request->has('image')) {

			Storage::delete($product->image);

			$params['image'] = $request->file('image')->store('products');
		}
		//$params['image'] = $path;

		// (+ч.17: Checkbox, Mutator)
		foreach (['new', 'hit', 'recommend'] as $fieldName) {

			if (!isset($params[$fieldName])) {

				$params[$fieldName] = 0;
			}
		}

		// для продукта, используя связь, получим его свойства и синжронизируем то что у него было с тем, что пришло из запроса при редактировании (+ч.34: Plural & Singular)
		$product->properties()->sync($request->property_id);

		$product->update($params);

		return redirect()->route('products.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Product $product)
	{
		$product->delete();

		return redirect()->route('products.index');
	}
}
