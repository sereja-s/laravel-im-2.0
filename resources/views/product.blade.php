@extends('layouts.master')

@section('title', $skus->product->name)

@section('content')

<!-- Single-Product Section Start Here -->
<section class="single-product">
	<div class="container">
		<div class="row">
			<!-- Product image  -->
			<div class="col-md-6 col-12 mb-5 mb-md-0">
				<div class="image scrolltop">
					<div class="outer-main">
						<div class="large-image swiper">
							<div class="wrap swiper-wrapper">
								<div class="swiper-slide item">
									<a href="{{ Storage::url($skus->product->image) }}" data-fslightbox="first-lightbox">
										<img src="{{ Storage::url($skus->product->image) }}" alt="{{ $skus->product->name }}" />
									</a>
								</div>
								<div class="swiper-slide item">
									<a href="/images/product_01b.jpg" data-fslightbox="first-lightbox">
										<img src="/images/product_01b.jpg" alt="" />
									</a>
								</div>
								<div class="swiper-slide item">
									<a href="/images/product_06.jpg" data-fslightbox="first-lightbox">
										<img src="/images/product_06.jpg" alt="" />
									</a>
								</div>
								<div class="swiper-slide item">
									<a href="/images/product_06b.jpg" data-fslightbox="first-lightbox">
										<img src="/images/product_06b.jpg" alt="" />
									</a>
								</div>
								<div class="swiper-slide item">
									<a href="/images/product_02.jpg" data-fslightbox="first-lightbox">
										<img src="/images/product_02.jpg" alt="" />
									</a>
								</div>
								<div class="swiper-slide item">
									<a href="/images/product_02b.jpg" data-fslightbox="first-lightbox">
										<img src="/images/product_02b.jpg" alt="" />
									</a>
								</div>
							</div>

							<div class="custom-pagination">
								<div class="swiper-pagination"></div>
							</div>
						</div>
					</div>

					<div class="outer-thumbnail">
						<div class="small-img swiper">
							<div class="wrap swiper-wrapper">
								<div class="swiper-slide item">
									<div class="thumb">
										<img src="{{ Storage::url($skus->product->image) }}" alt="{{ $skus->product->name }}" />
									</div>
								</div>
								<div class="swiper-slide item">
									<div class="thumb">
										<img src="/images/product_01b.jpg" alt="" />
									</div>
								</div>
								<div class="swiper-slide item">
									<div class="thumb">
										<img src="/images/product_06.jpg" alt="" />
									</div>
								</div>
								<div class="swiper-slide item">
									<div class="thumb">
										<img src="/images/product_06b.jpg" alt="" />
									</div>
								</div>
								<div class="swiper-slide item">
									<div class="thumb">
										<img src="/images/product_02.jpg" alt="" />
									</div>
								</div>
								<div class="swiper-slide item">
									<div class="thumb">
										<img src="/images/product_02.jpg" alt="" />
									</div>
								</div>
							</div>

							<!-- <div class="swiper-pagination"></div> -->
						</div>
					</div>
				</div>
			</div>
			<!-- Product Details -->
			<div class="col-md-6 col-12">
				<div class="summary ps-md-4 ps-0">
					<h3>{{ $skus->product->name }}</h3>
					<div class="d-flex justify-content-between price-review mt-4">
						<div class="d-flex">
							<span class="price">{{ $skus->price }} руб.</span>
							<div class="discount">
								<div style="text-decoration: none;">цена со скидкой</div>
								<div>-25%</div>
							</div>
						</div>
						<div class="review">
							<i class="ri-star-fill"></i>
							<span>4.8</span>
							<span class="ps-2">3 Review</span>
						</div>
					</div>
					<div class="color">
						<p>Colors:</p>
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
					<div class="size">
						<p>Sizes:</p>
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
					<div class="stock mt-4">
						<span><strong>201</strong> in stock</span>
						<span class="ps-3"> <i class="ri-checkbox-circle-line"></i></span>
					</div>

					@if($skus->isAvailable())

					<div class="quentity mt-4 mb-4">
						<div class="item">
							<button class="decrease">-</button>
							<input type="text" value="1" />
							<button class="increase">+</button>
						</div>

						@endif

						<div class="addcart" style="padding-bottom: 15px;">

							@if($skus->isAvailable())

							<form action="{{ route('basket-add', $skus->product) }}" method="POST">

								<button type="submit" class="btn-addcart">В корзину</button>

								<!-- <div class="buynow">
								<button class="btn-byenow">Buy Now</button>
							</div> -->
								@csrf

							</form>

							@else

							<span style="color:coral">товара нет в наличии</span>
							<h4>Сообщить мне когда товар появится в наличии</h4>


							<div class="warning" style="color: red; font-weight:700">
								@if($errors->get('email'))
								{!! $errors->get('email')[0] !!}
								@endif
							</div>



							<form action="{{ route('subscription', $skus) }}" method="post">
								@csrf
								<input type="text" name="email" placeholder="ваша эл.почта">
								<button style="border-radius: 5px;  padding: 3px 5px; background-color: #1288d7; border: none; color: white; font-size: 14px" type="submit">Отправить</button>
							</form>

							@endif

						</div>

					</div>
					<div class="shipping">
						<ul class="d-flex gap-3 align-items-center flex-wrap">
							<li>
								<a href="#0"><span><i class="ri-heart-2-line"></i></span> <span>Add to wishlist </span></a>
							</li>
							<li>
								<a href="#0"><span><i class="ri-arrow-left-right-fill"></i></span> <span>Compare </span></a>
							</li>
							<li>
								<a href="#0" class="data-trigger"><span><i class="ri-share-forward-line"></i></span> <span>Share</span></a>
							</li>
							<li>
								<a href="#0" class="data-trigger"><span><i class="ri-question-line"></i></span> <span>Ask Question</span></a>
							</li>
						</ul>

						<ul class="shipping-detalis">
							<li>
								<i class="ri-gift-line"></i>
								<span>Free Shipping & returns</span>
								<span class="gary-color ps-2">On orders over $100</span>
							</li>
							<li>
								<i class="ri-truck-line"></i>
								<span>Estimate delevery</span>
								<span class="gary-color"></span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection


@section('section-page')

<!-- Single-Product Navtab section start here -->
<section class="navtab-section">
	<div class="container">
		<!-- <div class="item"> -->
		<ul class="tab-navigation">
			<li class="active"><a href="#0" data-tab="tab1">Описание</a></li>
			<li><a href="#0" data-tab="tab2">Custom</a></li>
			<li>
				<a href="#0" class="position-relative" data-tab="tab3">
					Review
					<span class="item-flotaing position-absolute"><span>3</span></span>
				</a>
			</li>
			<li><a href="#0" data-tab="tab4">Shipping</a></li>
		</ul>
		<!-- </div> -->

		<div class="">
			<div class="tab-list">
				<div class="product list-content active" data-tab="tab1">
					<div class="row">
						<div class="mb-5">
							<h4>{{ $skus->product->name }}</h4>
							<p class="lh-lg">{{ $skus->product->description }}</p>


						</div>

						<div class="col-lg-4 col-md-6 col-12 mb-5">
							<span style="font-size: 18px;" class="">Характеристики</span>
							<ul class="ps-3 mt-3">
								<!-- Laravel: интернет магазин ч.35: Eloquent: whereHas -->
								<!-- Перечисляем набор свойств товара(если они есть) -->
								@isset($skus->product->properties)
								@foreach ($skus->propertyOptions as $propertyOption)
								<li>{{ $propertyOption->property->name }}: {{ $propertyOption->name }}</li>
								@endforeach
								@endisset
								<!-- <li>95% Polyester, 5% Spandex</li>
								<li>Wrap Closure</li>
								<li>Hand Wash Only</li>
								<li>sinple yet flatering</li> -->
							</ul>
						</div>
						<!-- <div class="col-lg-4 col-md-6 col-12 mb-5">
							<span class="">What makes our products unique?</span>
							<p class="mt-3 lh-lg">Alaways bring you new fashion style and pretly design. We dedicated our effort ot design beautiful clothing in quality</p>
						</div>
						<div class="col-lg-4 col-md-6 col-12 mb-5">
							<span class="">Washing Instructions</span>
							<p class="mt-3">Hand wash or gentle machine wash with cold water</p>
						</div> -->
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
</section>
<!-- Carousel Section copy from home page -->
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

@endsection