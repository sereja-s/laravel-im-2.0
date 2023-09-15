<h3>Уважаемый(-ая), {{ $name }} ваш заказ на сумму: {{ $fullSum }} руб. создан</h3>

<table>

	<tbody>

		@foreach($order->products as $product)

		<tr>

			<td>

				<a href="{{ route('product', [$product->category->code, $product->code]) }}">
					<img height="56px" src="{{ Storage::url($product->image) }}" alt="{{ $product->name}}">
					{{ $product->name }}
				</a>

			</td>

			<td>

				<span class="badge">{{ $product->pivot->count }}</span>

				<div class="btn-group form-inline">{{ $product->description }}</div>

			</td>

			<td>{{ $product->price }} руб.</td>
			<td>{{ $product->getPriceForCount() }} руб.</td>

		</tr>

		@endforeach

	</tbody>

</table>