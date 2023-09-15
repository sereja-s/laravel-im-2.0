@extends('layouts.master')

@section('title', 'Все категории')

@section('content')

<section class="category-section">
	<div class="container">
		<div class="row">
			<div class="heading">
				<h2 class="text-center">Категории</h2>
			</div>

			<div class="col-12">
				<div class="category-product">
					<div class="row">

						@foreach($categories as $category)

						<div class="col-md-3 col-sm-4 col-6 mb-3">

							<a href="{{ route('category', $category->code) }}">

								<div class="thumbnail">

									<div class="product-img">
										<img src="{{ Storage::url($category->image) }}" class="" alt="{{ $category->name }}" />
									</div>
									<!-- <div class="hoverable-img">
										<img src="/images/product_01b.jpg" alt="" />
									</div> -->

								</div>
								<div class="product-detalis text-center">

									<h4 style="font-size: 16px;">{{ $category->name }}</h4>
									<p>{{ $category->description }}</p>

								</div>

							</a>

						</div>

						@endforeach

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection