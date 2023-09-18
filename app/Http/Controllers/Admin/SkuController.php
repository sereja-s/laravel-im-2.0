<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkuRequest;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\Http\Request;

// ч.34: Plural & Singular

class SkuController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Product $product)
	{
		// получим все товарные предложения конкретного продукта (по 10-ть на странице)
		$skus = $product->skus()->paginate(10);

		return view('auth.skus.index', compact('skus', 'product'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Product $product)
	{
		// admin/products/{product}/skus/create 

		return view('auth.skus.form', compact('product'));
	}

	/**
	 * Метод сохранит данные добавленные в auth.skus.form
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(SkuRequest $request, Product $product)
	{
		// admin/products/{product}/skus

		$params = $request->all();

		$params['product_id'] = $request->product->id;

		$skus = Sku::create($params);

		$skus->propertyOptions()->sync($request->property_id);

		return redirect()->route('skus.index', $product);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Sku  $sku
	 * @return \Illuminate\Http\Response
	 */
	public function show(Product $product, Sku $sku)
	{
		// admin/products/{product}/skus/{sku}

		return view('auth.skus.show', compact('product', 'sku'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Sku  $sku
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Product $product, Sku $sku)
	{
		// admin/products/{product}/skus/{sku}/edit

		return view('auth.skus.form', compact('product', 'sku'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Sku  $sku
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Product $product, Sku $sku)
	{
		$params = $request->all();
		$params['product_id'] = $request->product->id;
		$sku->update($params);
		$sku->propertyOptions()->sync($request->property_id);
		return redirect()->route('skus.index', $product);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Sku  $sku
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Product $product, Sku $sku)
	{
		$sku->delete();
		return redirect()->route('skus.index', $product);
	}
}
