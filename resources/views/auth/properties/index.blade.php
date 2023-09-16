@extends('auth.layouts.master')

@section('title', 'Свойства')

@section('content')
<div class="col-md-12">
	<h1>Свойства</h1>
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
					Действия
				</th>
			</tr>
			@foreach($properties as $property)
			<tr>
				<td>{{ $property->id }}</td>

				<td>{{ $property->name }}</td>

				<td>
					<div class="btn-group" role="group">
						<form action="{{ route('properties.destroy', $property) }}" method="POST">
							<a class="btn btn-success" type="button" href="{{ route('properties.show', $property) }}">Открыть</a>
							<a class="btn btn-warning" type="button" href="{{ route('properties.edit', $property) }}">Редактировать</a>
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
	{{ $properties->links('pagination::bootstrap-4') }}

	<style>
		.pagination {
			display: flex;
			justify-content: center;
		}
	</style>

	<a class="btn btn-success" type="button" href="{{ route('properties.create') }}">Добавить свойство</a>
</div>
@endsection