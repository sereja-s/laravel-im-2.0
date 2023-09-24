<div class="col-md-4 col-sm-6 col-12 mb-4" style="position: relative;">

	<a href="{{ route('sku', [isset($category) ? $category->code : $sku->product->category->code, $sku->product->code, $sku->id]) }}" class="thumbnail">

		<div class="product-img">

			<img src="{{ Storage::url($sku->product->image) }}" class="" alt="{{ $sku->product->name }}" />

		</div>
		<!-- <div class="hoverable-img">
			<img src="/images/product_01b.jpg" alt="" />
		</div> -->
		<div class="label"><span>-32%</span></div>
		<div class="labels">
			@if($sku->product->isNew())
			<span class="badge badge-success">Новинка</span>
			@endif

			@if($sku->product->isRecommend())
			<span class="badge badge-warning">Рекомендуем</span>
			@endif

			@if($sku->product->isHit())
			<span class="badge badge-danger">Хит</span>
			@endif
		</div>


		<div class="actions">
			<ul>
				<li class="nav-item">
					<a href="#0" class="nav-link"><i class="ri-star-line"></i></a>
				</li>
				<li class="nav-item">
					<a href="#0" class="nav-link"><i class="ri-arrow-left-right-line"></i></a>
				</li>
				<li class="nav-item">
					<a href="#0" class="nav-link"><i class="ri-eye-line"></i></a>
				</li>
			</ul>
		</div>
	</a>

	<div class="product-detalis text-center" style="margin-top: 3px;">
		<!-- вместо непосредственного получения сатегории, применим матод: category() в модели: Product реализующему связь таблиц и через продукт обратимся уже не к методу, а к одноимённму свойству -->
		<h4>{{ $sku->product->name }}<br>( {{ $sku->product->category->name }} )</h4>



		<!-- <span class="discount">$63.00</span> -->
		<span class="current">{{ $sku->price }}руб.</span>
	</div>

	<!-- в action в route 2-ым параметром укажем $product, который по умолчанию возмёт поле id (т.е. $product->id можно не указывать) -->
	<form action="{{ route('basket-add', $sku) }}" method="POST">

		<div class="addcart" style="display: flex; justify-content: center; padding-top: 5px; z-index: 10">

			@if($sku->isAvailable())

			<button type="submit" class="btn-addcart" style="border-radius: 5px;  padding: 5px 10px; background-color: #1288d7; border: none; color: white;">В корзину</button>

			@else

			<p style="color:coral">товара нет в наличии</p>

			@endif

		</div>

		@csrf

	</form>

</div>