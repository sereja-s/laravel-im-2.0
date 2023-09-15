<h4>Уважаемый клиент, товар: {{ $product->name }} появился в наличии</h4>
<a href="{{ route('product', [$product->category->code, $product->code]) }}">Перейти на страничку товара</a>