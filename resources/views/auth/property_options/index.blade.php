@extends('auth.layouts.master')

@section('title', 'Варианты свойств')

@section('content')
<div class="col-md-12">
	<h1>Варианты свойств</h1>
	<table class="table">
		<tbody>
			<tr>
				<th>
					#
				</th>
				<th>
					Свойство
				</th>
				<th>
					Название
				</th>
				<th>
					Действия
				</th>
			</tr>
			@foreach($propertyOptions as $propertyOption)
			<tr>
				<td>{{ $propertyOption->id }}</td>

				<td>{{ $propertyOption->name }}</td>

				<td>
					<div class="btn-group" role="group">
						<form action="{{ route('property-options.destroy', $propertyOption) }}" method="POST">
							<a class="btn btn-success" type="button" href="{{ route('property-options.show', $propertyOption) }}">Открыть</a>
							<a class="btn btn-warning" type="button" href="{{ route('property-options.edit', $propertyOption) }}">Редактировать</a>
							@csrf
							@method('DELETE')
							<input class="btn btn-danger" type="submit" value="Удалить">
						</form>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<!--  пагинация -->
	{{ $propertyOptions->links('pagination::bootstrap-4') }}

	<style>
		.pagination {
			display: flex;
			justify-content: center;
		}
	</style>

	<a class="btn btn-success" type="button" href="{{ route('properties.create') }}">Добавить вариант свойства</a>
</div>
@endsection