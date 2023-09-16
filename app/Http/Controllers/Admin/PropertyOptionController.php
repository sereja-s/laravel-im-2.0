<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyOption;
use Illuminate\Http\Request;

// ч.33: Nested Resource Controller

class PropertyOptionController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$propertyOptions = PropertyOption::paginate(10);

		return view('auth.property_options.index', compact('propertyOptions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\PropertyOption  $propertyOption
	 * @return \Illuminate\Http\Response
	 */
	public function show(PropertyOption $propertyOption)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\PropertyOption  $propertyOption
	 * @return \Illuminate\Http\Response
	 */
	public function edit(PropertyOption $propertyOption)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\PropertyOption  $propertyOption
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, PropertyOption $propertyOption)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\PropertyOption  $propertyOption
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(PropertyOption $propertyOption)
	{
		//
	}
}