<h3>Уважаемый(-ая), {{ $name }} ваш заказ на сумму: {{ $fullSum }} руб. создан</h3>

<table>

	<tbody>

		@foreach($order->skus as $sku)

		<tr>

			<td>

				<a href="{{ route('sku', [$sku->product->category->code, $sku->product->code, $sku]) }}">
					<img height="56px" src="{{ Storage::url($sku->product->image) }}" alt="{{ $sku->product->name}}">
					{{ $sku->product->name }}
				</a>

			</td>

			<td>

				<span class="badge">{{ $sku->countInOrder }}</span>

				<div class="btn-group form-inline">{{ $sku->product->description }}</div>

			</td>

			<td>{{ $sku->price }} {{ $currencySymbol }}</td>
			<td>{{ $sku->getPriceForCount() }} {{ $currencySymbol }}</td>

		</tr>

		@endforeach

	</tbody>

</table>