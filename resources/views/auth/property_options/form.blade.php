@extends('auth.layouts.master')

@isset($propertyOption)
@section('title', 'Редактировать значение свойства ' . $propertyOption->name)
@else
@section('title', 'Добавить значение свойства')
@endisset

@section('content')
<div class="col-md-12">
	@isset($propertyOption)
	<h1>Редактировать значение свойства: {{ $property->name }} - <b>{{ $propertyOption->name }}</b></h1>
	@else
	<h1>Добавить значение для свойства: {{ $property->name }}</h1>
	@endisset

	<form method="POST" enctype="multipart/form-data" @isset($propertyOption) action="{{ route('property-options.update', [$property, $propertyOption]) }}" @else action="{{ route('property-options.store', $property) }}" @endisset>
		<div>

			@isset($propertyOption)
			@method('PUT')
			@endisset
			@csrf

			<br>
			<div class="input-group row">
				<label for="name" class="col-sm-2 col-form-label">Название: </label>
				<div class="col-sm-6">

					@error('name')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror

					<input type="text" class="form-control" name="name" id="name" value="@isset($propertyOption){{ $propertyOption->name }}@endisset">
				</div>
			</div>

			<br>

			<button class="btn btn-success">Сохранить</button>
		</div>
	</form>
</div>
@endsection