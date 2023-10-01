@extends('auth.layouts.master')

@section('title', 'Заказы')

@section('content')
<div class="col-md-12">
	<h1>Заказы</h1>
	<table class="table">
		<tbody>
			<tr>
				<th>
					#
				</th>
				<th>
					Имя
				</th>
				<th>
					Телефон
				</th>
				<th>
					Когда отправлен
				</th>
				<th>
					Сумма
				</th>
				<th>
					Действия
				</th>
			</tr>
			@foreach($orders as $order)
			<tr>
				<td>{{ $order->id}}</td>
				<td>{{ $order->name }}</td>
				<td>{{ $order->phone }}</td>
				<td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
				<td>{{ $order->sum }} {{ $order->currency->symbol }}</td>
				<td>
					<div class="btn-group" role="group">

						<!-- ч.15: Blade Custom Directive -->
						@admin

						<a class="btn btn-success" type="button" href="{{ route('orders.show', $order) }}">Открыть</a>

						@else

						<a class="btn btn-success" type="button" href="{{ route('person.orders.show', $order) }}">Открыть</a>

						@endadmin

					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<!--  пагинация -->
	{{ $orders->links('pagination::bootstrap-4') }}

	<style>
		.pagination {
			display: flex;
			justify-content: center;
		}
	</style>

</div>
@endsection