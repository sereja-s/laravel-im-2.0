@extends('layouts.master', ['file' => 'index'])

@section('title', 'Главная')

@section('content')
<!-- Slider-section start here -->
<section class="slider-section">
	<div class="container-fluid p-0">
		<div class="swiper slider-box">
			<!-- Additional required wrapper -->
			<div class="swiper-wrapper">
				<!-- Slides -->
				<div class="swiper-slide item">
					<div class="slider-img">
						<div class="ob-cover">
							<img src="/images/slider_01.jpg" class="img-fluid" alt="" />
						</div>
						<div class="slider-content">
							<div class="title-info">
								<span class="price"><span>$32</span></span>
								<h2 class="title">Felle the tosca color</h2>
								<div class="button mt-4"><a href="#0" class="seconday-btn">Shop Now</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="swiper-slide item">
					<div class="slider-img">
						<div class="ob-cover">
							<img src="/images/slider_02.jpg" class="img-fluid" alt="" />
						</div>
						<div class="slider-content">
							<div class="title-info">
								<span class="price"><span>$32</span></span>
								<h2 class="title">Felle the tosca color</h2>
								<div class="button mt-4"><a href="#0" class="seconday-btn">Shop Now</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="swiper-slide item">
					<div class="slider-img">
						<div class="ob-cover">
							<img src="/images/slider_03.jpg" class="img-fluid" alt="" />
						</div>
						<div class="slider-content">
							<div class="title-info">
								<span class="price"><span>$32</span></span>
								<h2 class="title">Felle the tosca color</h2>
								<div class="button mt-4"><a href="#0" class="seconday-btn">Shop Now</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- If we need pagination -->
			<div class="custom-pagination">
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</div>
</section>

<!-- Product Guide Section Start here -->
<section class="product-guide">
	<div class="container">
		<div class="row">
			<h2 class="text-center mb-5">Самые популярные товары</h2>
		</div>

		<div class="wrapper">

			@foreach($bestProducts as $bestProduct)

			<div class="item">
				<a href="{{ route('product', [$bestProduct->category->code, $bestProduct->code]) }}" class="guide-content">
					<div class="guide-img">
						<img src="{{ Storage::url($bestProduct->image) }}" class="img-fluid" alt="{{ $bestProduct->name }}" />
					</div>
					<div class="guide-text text-center">
						<div class="guide-title">{{ $bestProduct->name }}</div>
						<p>{{ $bestProduct->description }}</p>
					</div>
				</a>
			</div>

			@endforeach

			<!-- <div class="item">
				<div class="guide-content">
					<div class="guide-img">
						<img src="/images/guide_02.png" class="img-fluid" alt="" />
					</div>
					<div class="guide-text text-center">
						<div class="guide-title">The Blue Ocean Mx</div>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi.</p>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="guide-content">
					<div class="guide-img">
						<img src="/images/guide_03.png" class="img-fluid" alt="" />
					</div>
					<div class="guide-text text-center">
						<div class="guide-title">The Blue Ocean Mx</div>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi.</p>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</section>

<!-- Carousel Section Start Here -->
<section class="carousel-section section-wrapper">
	<div class="container">
		<div class="row">
			<h2 class="text-center">New Arrivals</h2>
		</div>
		<div class="carousel-wrapper">
			<div class="swiper carousel-box">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper">
					<!-- Slides -->
					<div class="swiper-slide">
						<div class="">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_07.jpg" class="img-fluid" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_07b.jpg" alt="" />
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
						</div>
					</div>
					<div class="swiper-slide">
						<div class="">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_08.jpg" class="img-fluid" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_08b.jpg" alt="" />
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
						</div>
					</div>
					<div class="swiper-slide">
						<div class="">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_06.jpg" class="img-fluid" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_06b.jpg" alt="" />
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
						</div>
					</div>
					<div class="swiper-slide">
						<div class="">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_02.jpg" class="img-fluid" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_02b.jpg" alt="" />
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
						</div>
					</div>
					<div class="swiper-slide">
						<div class="">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_04.jpg" class="img-fluid" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_04b.jpg" alt="" />
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
						</div>
					</div>
					<div class="swiper-slide">
						<div class="">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_03.jpg" class="img-fluid" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_03b.jpg" alt="" />
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
						</div>
					</div>
					<div class="swiper-slide">
						<div class="">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_05.jpg" class="img-fluid" alt="" />
								</div>
								<div class="hoverable-img">
									<img src="/images/product_05b.jpg" alt="" />
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
						</div>
					</div>
					<div class="swiper-slide">
						<div class="">
							<div class="thumbnail">
								<a href="#0"></a>
								<div class="product-img">
									<img src="/images/product_01.jpg" class="img-fluid" alt="" />
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
						</div>
					</div>
				</div>
				<!-- If we need navigation buttons -->
				<div class="nav">
					<div class="swiper-button-next">
						<i class="ri-arrow-right-line"></i>
					</div>
					<div class="swiper-button-prev">
						<i class="ri-arrow-left-line"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Product-showcase section Start Here -->
<section class="showcase-section">
	<div class="container">
		<div class="row">
			<ul class="d-flex justify-content-center gap-3 align-items-center showcase-heading">
				<li class="title"><a href="#0">In</a></li>
				<li class="tab-toggle">
					<span class="value">Sweater</span>
					<i class="ri-arrow-down-s-line rotate"></i>
					<ul class="value-content">
						<li class="active tab-trigger" data-tab="tab1"><a href="#0">Sweater</a></li>
						<li class="tab-trigger" data-tab="tab2"><a href="#0">Hoddies</a></li>
						<li class="tab-trigger" data-tab="tab3"><a href="#0">Shirts</a></li>
					</ul>
				</li>
			</ul>
		</div>

		<div class="tabnav mt-5">
			<div class="sweater tab-item active" data-tab="tab1">
				<div class="row row-cols-lg-5 row-cols-md-4 row-cols-sm-2 row-cols-1">
					<div class="col mb-3">
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_04.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_04b.jpg" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_03.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_03b.jpg" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_05.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_05b.jpg" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_06.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_06b.jpg" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_07.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_07b.jpg" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_08.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_08b.jpg" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_01.jpg" class="img-fluid" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_06.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_06b.jpg" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_01.jpg" class="img-fluid" alt="" />
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
					</div>
				</div>
			</div>

			<div class="hoddies tab-item" data-tab="tab2">
				<div class="row row-cols-lg-5 row-cols-md-4 row-cols-sm-2 row-cols-1">
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_07.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_07b.jpg" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_08.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_08b.jpg" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_01.jpg" class="img-fluid" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_06.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_06b.jpg" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_01.jpg" class="img-fluid" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_01.jpg" class="img-fluid" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_04.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_04b.jpg" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_03.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_03b.jpg" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_05.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_05b.jpg" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_06.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_06b.jpg" alt="" />
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
					</div>
				</div>
			</div>

			<div class="shirts tab-item" data-tab="tab3">
				<div class="row row-cols-lg-5 row-cols-md-4 row-cols-sm-2 row-cols-1">
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_06.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_06b.jpg" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_01.jpg" class="img-fluid" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_01.jpg" class="img-fluid" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_04.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_04b.jpg" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_01.jpg" class="img-fluid" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_04.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_04b.jpg" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_03.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_03b.jpg" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_05.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_05b.jpg" alt="" />
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
					</div>
					<div class="col mb-3">
						<div class="thumbnail">
							<a href="#0"></a>
							<div class="product-img">
								<img src="/images/product_06.jpg" class="img-fluid" alt="" />
							</div>
							<div class="hoverable-img">
								<img src="/images/product_06b.jpg" alt="" />
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
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Announcement Section start Here -->
<section class="annoucement-section">
	<div class="container">
		<div class="row">
			<span>Promo</span>
			<h1 class="mb-3">Get Ready !</h1>
			<h1>Winter is Coming.</h1>
			<div class="button mt-4">
				<a href="#0" class="seconday-btn">Go get it</a>
			</div>
		</div>
	</div>
</section>

<!-- Bloog Section Start Here -->

<section class="blog-section section-wrapper">
	<div class="container">
		<div class="row mb-5">
			<h2 class="text-center">From The Blog</h2>
		</div>
		<!-- Copy From product -->
		<div class="wrapper">
			<div class="item">
				<div class="guide-content">
					<div class="guide-img">
						<img src="images/blog_01.jpg" class="img-fluid" alt="" />
					</div>
					<div class="blog-content text-center mt-3">
						<span>Hoddie</span>
						<p class="mt-3">What is easier knitting or crocheting ?</p>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="guide-content">
					<div class="guide-img">
						<img src="images/blog_02.jpg" class="img-fluid" alt="" />
					</div>
					<div class="blog-content text-center mt-3">
						<span>Hoddie</span>
						<p class="mt-3">Properly ware a Hoddie</p>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="guide-content">
					<div class="guide-img">
						<img src="/images/blog_03.jpg" class="img-fluid" alt="" />
					</div>
					<div class="blog-content text-center mt-3">
						<span class="">Hoddie</span>
						<p class="mt-3">What shoul I wear under a sweater?</p>
					</div>
				</div>
			</div>
		</div>
		<div class="button mt-5 text-center">
			<a href="#0" class="seconday-btn">Read More</a>
		</div>
	</div>
</section>

<!-- Instagram Section Start here -->
<section class="instagram-section">
	<div class="container">
		<div class="row mb-5">
			<h2 class="text-center">Popular Instagram Photos</h2>
		</div>
		<div class="wrapper">
			<div class="item">
				<div class="insta-content">
					<div class="insta-img">
						<img src="/images/ig_01.jpg" class="img-fluid" alt="" />
					</div>
					<span class="insta-link">
						<a href="#0"><i class="ri-instagram-line"></i></a>
					</span>
				</div>
			</div>
			<div class="item">
				<div class="insta-content">
					<div class="insta-img">
						<img src="/images/ig_02.jpg" class="img-fluid" alt="" />
					</div>
					<span class="insta-link">
						<a href="#0"><i class="ri-instagram-line"></i></a>
					</span>
				</div>
			</div>
			<div class="item">
				<div class="insta-content">
					<div class="insta-img">
						<img src="/images/ig_03.jpg" class="img-fluid" alt="" />
					</div>
					<span class="insta-link">
						<a href="#0"><i class="ri-instagram-line"></i></a>
					</span>
				</div>
			</div>
			<div class="item">
				<div class="insta-content">
					<div class="insta-img">
						<img src="/images/ig_04.jpg" class="img-fluid" alt="" />
					</div>
					<span class="insta-link">
						<a href="#0"><i class="ri-instagram-line"></i></a>
					</span>
				</div>
			</div>
			<div class="item">
				<div class="insta-content">
					<div class="insta-img">
						<img src="/images/ig_05.jpg" class="img-fluid" alt="" />
					</div>
					<span class="insta-link">
						<a href="#0"><i class="ri-instagram-line"></i></a>
					</span>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection