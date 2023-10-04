@extends('layouts.master')

@section('title', 'Корзина')

@section('content')

<!-- heading section Start here -->
<section class="section-heading my-5">
	<section class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="text-center">Корзина</h3>
			</div>
		</div>
	</section>
</section>

<!-- Cart Section Start Here -->
<section class="cart-page">
	<div class="container">

		@foreach($order->skus as $sku)

		<div class="row">

			<div class="col-md-6 col-sm-12 p-0">
				<div class="details">
					<div class="item d-flex align-items-center justify-content-between flex-wrap">
						<div class="cart-img mb-3 mb-sm-0">
							<a href="{{ route('sku', [$sku->product->category->code, $sku->product->code, $sku]) }}"><img src="{{ Storage::url($sku->product->image) }}" alt="{{ $sku->product->name }}" /></a>
						</div>
						<div class="cart-details">
							<h6 class="mb-0">{{ $sku->product->name }}</h6>
							<p class="mb-0">Color: Tosca</p>
							<p class="mb-0">Size: L</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-12 p-0">
				<div class="cart-quantity d-flex justify-content-between align-items-center flex-wrap">
					<div class="inc-dec">

						<form action="{{ route('basket-remove', $sku) }}" method="POST"><button type="submit">-</button>@csrf</form>

						<input type="text" value="{{ $sku->countInOrder }}" class="text-center" />

						<form action="{{ route('basket-add', $sku) }}" method="POST"><button type="submit">+</button>@csrf</form>

					</div>
					<div>

						<p class="price mb-0">{{ $sku->price }} {{ $currencySymbol }} за ед.</p>
						<p class="price mb-0">всего: {{ $sku->price * $sku->countInOrder }} {{ $currencySymbol }}</p>
					</div>
					<div class="delete-button">
						<a href="#0"><i class="ri-close-line"></i></a>
					</div>
				</div>
			</div>

		</div>

		@endforeach

	</div>
</section>

<section class="cart-subtotal-section">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-12 mb-4 mb-md-0">
				<div class="add-note">
					<textarea name="" id="" rows="6" class="form-control" placeholder="Additional Note+"></textarea>
				</div>
			</div>
			<div class="col-md-6 col-12">
				<div class="subtotal-confirm ps-0 ps-md-4">
					<div class="mb-3">
						<span>Итого к оплате:</span>
						<span class="ms-4">{{ $order->getFullSum() }} руб.</span>
					</div>
					<div class="subtotal-section mb-5">
						<ul class="">
							<li>
								<input type="radio" id="account" required /> <label for="account"> Я согласен с <a href="#0" class="gary-color">политикой конфиденциальности</a></label>
							</li>
						</ul>
					</div>
					<div class="button">
						<a href="{{ route('basket-place') }}" class="checkout-btn">Оформить заказ</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection


@section('section-page')

<!-- Single-Product Navtab section start here -->
<!-- <section class="navtab-section">
	<div class="container">
		
		<ul class="tab-navigation">
			<li class="active"><a href="#0" data-tab="tab1">Product details</a></li>
			<li><a href="#0" data-tab="tab2">Custom</a></li>
			<li>
				<a href="#0" class="position-relative" data-tab="tab3">
					Review
					<span class="item-flotaing position-absolute"><span>3</span></span>
				</a>
			</li>
			<li><a href="#0" data-tab="tab4">Shipping</a></li>
		</ul>
		

		<div class="">
			<div class="tab-list">
				<div class="product list-content active" data-tab="tab1">
					<div class="row">
						<div class="mb-5">
							<h4>The Sweater is Tosca</h4>
							<p class="lh-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime omnis quibusdam voluptatum eligendi maiores modi id repellat culpa quis, animi fugiat? Et eligendi ex asperiores.</p>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, iusto.</p>
						</div>

						<div class="col-lg-4 col-md-6 col-12 mb-5">
							<span class="">What is this?</span>
							<ul class="ps-3 mt-3">
								<li>95% Polyester, 5% Spandex</li>
								<li>Wrap Closure</li>
								<li>Hand Wash Only</li>
								<li>sinple yet flatering</li>
							</ul>
						</div>
						<div class="col-lg-4 col-md-6 col-12 mb-5">
							<span class="">What makes our products unique?</span>
							<p class="mt-3 lh-lg">Alaways bring you new fashion style and pretly design. We dedicated our effort ot design beautiful clothing in quality</p>
						</div>
						<div class="col-lg-4 col-md-6 col-12 mb-5">
							<span class="">Washing Instructions</span>
							<p class="mt-3">Hand wash or gentle machine wash with cold water</p>
						</div>
					</div>
				</div>
				<div class="custom list-content" data-tab="tab2">
					<h2 class="text-center mb-3">Our Custom Sizes</h2>
					<div class="custom-img">
						<img src="/images/custom-size.jpg" class="img-fluid" alt="" />
					</div>
				</div>
				<div class="review list-content" data-tab="tab3">
					<h3>Rating & Review</h3>
					<div class="ratting d-flex justify-content-between align-items-center flex-wrap">
						<div class="position-relative">
							<span class="total">4.8</span>
							<span class="current-review">3 reviews</span>
						</div>
						<div class="button">
							<a href="#0" class="main-btn data-trigger">Write a Review</a>
						</div>
					</div>
					<div class="item">
						<div class="review-list d-flex">
							<div class="review-img">
								<img src="/images/ig_01.jpg" class="img-fluid" alt="" />
							</div>
							<div class="review-detalis lh-base mb-4">
								<span class="person-name"><strong>Sarah</strong></span>
								<div class="star">
									<i class="ri-star-fill"></i>
									<i class="ri-star-fill"></i>
									<i class="ri-star-fill"></i>
									<i class="ri-star-fill"></i>
									<i class="ri-star-fill"></i>
								</div>
								<span class="date">On November 07,2023</span>
							</div>
						</div>
						<div class="comment">
							<h6>Aeesome Product</h6>
							<p class="lh-lg">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur laborum eum unde assumenda accusantium quibusdam ea doloribus cum quae quos.</p>
						</div>
					</div>
					<div class="item">
						<div class="review-list d-flex">
							<div class="review-img">
								<img src="/images/ig_02.jpg" class="img-fluid" alt="" />
							</div>
							<div class="review-detalis lh-base mb-4">
								<span class="person-name"><strong>Kamila</strong></span>
								<div class="star">
									<i class="ri-star-fill"></i>
									<i class="ri-star-fill"></i>
									<i class="ri-star-fill"></i>
									<i class="ri-star-fill"></i>
									<i class="ri-star-fill"></i>
								</div>
								<span class="date">On November 07,2023</span>
							</div>
						</div>
						<div class="comment">
							<h6>Aeesome Product</h6>
							<p class="lh-lg">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur laborum eum unde assumenda accusantium quibusdam ea doloribus cum quae quos.</p>
						</div>
					</div>
					<div class="item">
						<div class="review-list d-flex">
							<div class="review-img">
								<img src="/images/ig_01.jpg" class="img-fluid" alt="" />
							</div>
							<div class="review-detalis lh-base mb-4">
								<span class="person-name"><strong>Sandy</strong></span>
								<div class="star">
									<i class="ri-star-fill"></i>
									<i class="ri-star-fill"></i>
									<i class="ri-star-fill"></i>
									<i class="ri-star-fill"></i>
									<i class="ri-star-fill"></i>
								</div>
								<span class="date">On November 07,2023</span>
							</div>
						</div>
						<div class="comment">
							<h6>Aeesome Product</h6>
							<p class="lh-lg">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur laborum eum unde assumenda accusantium quibusdam ea doloribus cum quae quos.</p>
						</div>
					</div>
				</div>
				<div class="shipping list-content" data-tab="tab4">
					<p class="lh-lg">Shipping cost is based on weight. Just and product to yout cart and use the Shipping Calcultor to see the shippig price Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consectetur aperiam quas id, in esse delectus.</p>
				</div>
			</div>
		</div>
	</div>
</section> -->
<!-- Carousel Section copy from home page -->
<!-- <section class="carousel-section section-wrapper">
	<div class="container">
		<div class="row">
			<h2 class="text-center">New Arrivals</h2>
		</div>
		<div class="carousel-wrapper">
			<div class="swiper carousel-box">

				<div class="swiper-wrapper">

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
</section> -->

@endsection