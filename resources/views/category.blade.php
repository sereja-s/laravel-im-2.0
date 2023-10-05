@extends('layouts.master')

@section('title', 'Категория:' .' '. $category->name)

@section('content')

<section class="category-section">
	<div class="container">
		<div class="row">
			<div class="heading">
				<h2 class="text-center">{{ $category->name }}</h2>
			</div>
			<p class="text-center">{{ $category->description }}</p>

			<!-- <p class="text-center">( Количество товаров: {{ $category->products->map->skus->count() }} )</p> -->
			<div class="col-lg-3 col-md-12 mb-lg-0 mb-5">

				<!-- Filter section -->




			</div>
			<div class="col-lg-9 col-md-12">
				<div class="category-product">
					<div class="row">
						<div class="col-12 mb-3">
							<div class="short-list float-end">
								<div class="">
									<ul class="short-menu d-flex flex-wrap gap-4 align-items-center">
										<li class="short-heading position-relative me-md-4">
											<a href="#0" class="heading-value">Default sorting</a>
											<span><i class="ri-arrow-down-s-line rotate"></i></span>
											<ul class="short-item">
												<li class="active"><a href="#0">Default sorting</a></li>
												<li><a href="#0">Popular</a></li>
												<li><a href="#0">Rating</a></li>
												<li><a href="#0">Latest</a></li>
												<li><a href="#0">Price: low to high</a></li>
												<li><a href="#0">Price: High to low</a></li>
											</ul>
										</li>
										<li>
											<a href="#0"><i class="ri-pause-line"></i></a>
										</li>
										<li>
											<a href="#0"><i class="ri-list-check-2"></i></a>
										</li>
										<li>
											<a href="#0"><i class="ri-layout-grid-line"></i></a>
										</li>
										<li>
											<a href="#0"><i class="ri-layout-masonry-line"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>

						@foreach($category->products->map->skus->flatten() as $sku)

						@include('layouts.card', compact('sku'))

						@endforeach

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection