<h4>Уважаемый клиент, товар: {{ $sku->name }} появился в наличии</h4>
<!-- <a href="{{ route('product', [$sku->category->code, $sku->code]) }}">Перейти на страничку товара</a> -->
<a href="{{ route('sku', [$sku->product->category->code, $sku->product->code, $sku]]) }}">Перейти на страничку товара</a>