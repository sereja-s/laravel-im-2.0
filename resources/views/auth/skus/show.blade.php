@extends('auth.layouts.master')

@section('title', 'Свойство: ' . $property->name)

@section('content')
<div class="col-md-12">
	<h1>Категория {{ $property->name }}</h1>
	<table class="table">
		<tbody>
			<tr>
				<th>
					Поле
				</th>
				<th>
					Значение
				</th>
			</tr>
			<tr>
				<td>ID</td>
				<td>{{ $property->id }}</td>
			</tr>

			<tr>
				<td>Название</td>
				<td>{{ $property->name }}</td>
			</tr>


		</tbody>
	</table>
</div>
@endsection