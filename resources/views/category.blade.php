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

				@include('layouts.filter')

				<!-- <div class="filter-conteiner">
					<div class="filter-trigger">
						<a href="#0"><i class="ri-filter-line"></i></a>
					</div>
					<form class="filter-content">
						<h3 class="filter-heading">Filter</h3>
						<ul class="filter-nav mt-3">
							<li class="nav-item has-child active">
								<a href="#0" class="nav-link d-flex align-items-center justify-content-between">
									<span>Size</span>
									<span class=""><i class="ri-arrow-down-s-line rotate"></i></span>
								</a>
								<div class="size pt-0">
									<form action="" class="d-flex">
										<input type="radio" id="xl" name="size" checked />
										<label for="xl">XL</label>
										<input type="radio" id="l" name="size" />
										<label for="l">L</label>
										<input type="radio" id="m" name="size" />
										<label for="m">M</label>
										<input type="radio" id="s" name="size" />
										<label for="s">S</label>
									</form>
								</div>
							</li>
							<li class="nav-item has-child">
								<a href="#0" class="nav-link d-flex align-items-center justify-content-between">
									<span>Color</span>
									<span class=""><i class="ri-arrow-down-s-line rotate"></i></span>
								</a>
								<div class="color mt-0 mb-0">
									<form action="" class="d-flex">
										<p>
											<input type="radio" id="tosca" name="color" />
											<label for="tosca" class="circle tosca"></label>
										</p>
										<p>
											<input type="radio" id="brown" name="color" />
											<label for="brown" class="circle brown"></label>
										</p>
										<p>
											<input type="radio" id="ocean" name="color" checked />
											<label for="ocean" class="circle ocean"></label>
										</p>
									</form>
								</div>
							</li>
							<li class="nav-item has-child active">
								<a href="#0" class="nav-link d-flex align-items-center justify-content-between">
									<span>Category</span>
									<span class=""><i class="ri-arrow-down-s-line rotate"></i></span>
								</a>
								<ul class="sub-link pt-0">
									<li class="nav-item"><a href="#0" class="nav-link">Active Wear</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">beauty</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Candles</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Fashion</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Furniture</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Glasses</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Hat</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Nail Polishing</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Organic</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Backpack</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Bedding</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Coffee</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Living</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Plants</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Sneaker</a></li>
								</ul>
							</li>
							<li class="nav-item has-child">
								<a href="#0" class="nav-link d-flex align-items-center justify-content-between">
									<span>Brands</span>
									<span class=""><i class="ri-arrow-down-s-line rotate"></i></span>
								</a>
								<ul class="sub-link pt-0">
									<li class="nav-item"><a href="#0" class="nav-link">Adidas</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Chanel</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Dolce & Gabbna</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Ganni</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Gucci</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Louis Vuitton</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Nike</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Panda</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Puma</a></li>
									<li class="nav-item"><a href="#0" class="nav-link">Zara</a></li>
								</ul>
							</li>
						</ul>
						
						<h4 class="category-filter__title category-filter__title" style="padding:10px 10px 50px 5px; font-family: inherit;">Цена</h4>
						<div class="section-filter__body" style="padding-bottom: 35px;">
							<div class="filters-price__slider" id="range-slider" style="margin-left: 5px;"></div>
							<div class="filters-price__inputs">
								<label class="filters-price__label">
									<span class="filters-price__text">от</span>
									<input type="text" name="min_price" value="0" class="filters-price__input" id="input-0">
									<span class="filters-price__text">₽</span>
								</label>
								<label class="filters-price__label">
									<span class="filters-price__text">до</span>
									<input type="text" name="max_price" value="120" class="filters-price__input" id="input-1">
									<span class="filters-price__text">₽</span>
								</label>
							</div>
						</div>
						<div class="filter__buttons">

							<button class="btn">Подбор</button>
						</div>
					</form>
					<button class="btn btn--transparent-gray" style="margin: 15px 0;" onclick="location.href = location.pathname">Сброс</button>
				</div> -->
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