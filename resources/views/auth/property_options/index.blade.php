@extends('auth.layouts.master')

@section('title', 'Значения свойства')

@section('content')
<div class="col-md-12">

	<h1>Значения свойства: {{ $property->name }}</h1>
	<table class="table">
		<tbody>
			<tr>
				<th>
					#
				</th>

				<th>
					Название
				</th>

				<th>
					Для свойства:
				</th>

				<th>
					Действия
				</th>
			</tr>
			@foreach($propertyOptions as $propertyOption)
			<tr>
				<td>{{ $propertyOption->id }}</td>

				<td style="font-size: 16px;">{{ $propertyOption->name }}</td>

				<td>{{ $property->name }}</td>


				<td>
					<div class="btn-group" role="group">
						<form action="{{ route('property-options.destroy', [$property, $propertyOption]) }}" method="POST">
							<a class="btn btn-success" type="button" href="{{ route('property-options.show', [$property, $propertyOption]) }}">Открыть</a>
							<a class="btn btn-warning" type="button" href="{{ route('property-options.edit', [$property, $propertyOption]) }}">Редактировать</a>
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

	<a class="btn btn-success" type="button" href="{{ route('property-options.create', $property) }}">Добавить значение свойства</a>
</div>
@endsection