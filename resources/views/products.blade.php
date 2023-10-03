@extends('layouts.master')

@section('title', 'Все товары')

@section('content')

<section class="category-section">
	<div class="container">
		<div class="row">
			<div class="heading">
				<h2 class="text-center">Все товары</h2>
			</div>

			<div class="col-lg-3 col-md-12 mb-lg-0 mb-5">

				<!-- Filter section -->

				<!-- <form action="{{ route('products') }}">

					<div class="filter-conteiner">
						<div class="filter-trigger">
							<a href="#0"><i class="ri-filter-line"></i></a>
						</div>

						<div class="filter-content">
							<h3 class="filter-heading">Filter</h3>
							<ul class="filter-nav mt-3">
								
							</ul>

							<h4 class="category-filter__title category-filter__title" style="padding:10px 10px 50px 5px; font-family: inherit;">Цена</h4>
							<div class="section-filter__body" style="padding-bottom: 35px;">
								<div class="filters-price__slider" id="range-slider" style="margin-left: 5px;"></div>
								<div class="filters-price__inputs">
									<label class="filters-price__label">
										<span class="filters-price__text">от</span>
										<input type="text" name="min_price" value="{{ request()->min_price ?? $skusAll->min('price') }}" class="filters-price__input" id="input-0">
										<span class="filters-price__text">₽</span>
									</label>
									<label class="filters-price__label">
										<span class="filters-price__text">до</span>
										<input type="text" name="max_price" value="{{ request()->max_price ?? $skusAll->max('price') }}" class="filters-price__input" id="input-1">
										<span class="filters-price__text">₽</span>
									</label>
								</div>
							</div>

							<div class="col-sm-2 col-md-2">
								<label style="display: flex;" for="hit">
									<input type="checkbox" name="hit" id="hit" @if(request()->has('hit')) checked @endif> &nbsp;Хит
								</label>
							</div>
							<div class="col-sm-2 col-md-2">
								<label style="display: flex;" for="new">
									<input type="checkbox" name="new" id="new" @if(request()->has('new')) checked @endif> &nbsp;Новинка
								</label>
							</div>
							<div class="col-sm-2 col-md-2">
								<label style="display: flex;" for="recommend">
									<input type="checkbox" name="recommend" id="recommend" @if(request()->has('recommend')) checked @endif> &nbsp;Рекомендуем
								</label>
							</div>

							<div style="padding-top: 25px;" class="filter__buttons">
								<button type="submit" class="btn">Подбор</button>
							</div>
						</div>

					</div>

				</form>

				<button class="btn btn--transparent-gray" style="margin: 15px 0;" onclick="location.href = location.pathname">Сброс</button> -->

				@include('layouts.filter')

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

						@foreach($skus as $sku)

						@include('layouts.card', compact('sku'))

						@endforeach


						{{ $skus->onEachSide(2)->links('pagination::bootstrap-4') }}

						<style>
							.pagination {
								justify-content: center;
							}
						</style>

						<!-- <div class="col-md-4 col-sm-6 col-12 mb-4">

							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_01.jpg" class="" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_01b.jpg" alt="" />
								</div>
								<div class="label"><span>-32%</span></div>
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
							</div>
							<div class="product-detalis text-center">
								<h4>The Sweater in Tosca</h4>
								<span class="discount">$62.00</span>
								<span class="current">$45.00</span>
							</div>

						</div> -->
					</div>

				</div>
			</div>
		</div>
	</div>
</section>



@endsection