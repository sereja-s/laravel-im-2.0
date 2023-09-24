<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>@yield('title')</title>

	<!-- Bootstrap Cdn link  -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />

	<!-- Rimix Icon cdn link -->
	<link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet" />

	<!-- Swiper css link -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

	<!-- Custom css link -->
	<link rel="stylesheet" href="/css/style.css" />
	<link rel="stylesheet" href="/css/responsive-style.css" />
	<link rel="stylesheet" href="/css/nouislider.min.css" />
</head>

<body>
	<header>
		<!-- Top navigation bar start here -->
		<nav class="navigation-wrapper bg-light">
			<div class="container d-flex justify-content-between align-items-center">
				<div class="header-left">
					<a href="#0" class="d-lg-none d-block menu-toggle"><i class="ri-menu-line"></i></a>
					<ul class="d-lg-flex d-none p-0 gap-3 sub">

						<li class="nav-item" style="position:relative;">
							<a style="padding: 7px;" href="#0" class="nav-link"><i class="ri-user-line"></i></a>
						</li>
						<div class="sub-menu" style="position: absolute; top: 77px; left: 7px;">
							<ul class="sub-link" style="line-height: 10px">

								@guest
								<li class="nav-item"><a href="{{ route('register') }}" class="nav-link" style="font-size: 16px;">Pегистрация</a></li>
								<li class="nav-item"><a href="{{ route('login') }}" class="nav-link" style="font-size: 16px;">Войти</a></li>
								@endguest

								@auth

								@admin

								<li class="nav-item"><a href="{{ route('home') }}" class="nav-link" style="font-size: 16px; line-height: 15px">Панель администратора</a></li>

								@else

								<li class="nav-item"><a href="{{ route('person.orders.index') }}" class="nav-link" style="font-size: 16px;">Мои заказы</a></li>

								@endadmin

								<li class="nav-item"><a href="{{ route('log-out') }}" class="nav-link" style="font-size: 16px;">Выйти</a></li>

								@endauth
							</ul>
						</div>
						<!-- <li class="nav-item">
							<a href="#0" class="nav-link position-relative">
								<i class="ri-star-line"></i>
								<span class="item-flotaing position-absolute"><span>7</span></span>
							</a>
						</li> -->

					</ul>
				</div>
				<div class="header-center d-lg-flex d-none">
					<ul class="d-flex gap-4">
						<li class="nav-item"><a href="{{ route('index') }}" class="nav-link">Home</a></li>
						<li class="nav-item mega">
							<a href="{{ route('products') }}" class="nav-link">Все товары
								<i class="ri-arrow-down-s-line rotate"></i>
							</a>
							<div class="mega-content">
								<div class="container">
									<div class="row">
										<div class="col-2">
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
										<div class="col-2">
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
											<div class="product-detalis text-center">
												<h4>The Sweater in Tosca</h4>
												<span class="discount">$62.00</span>
												<span class="current">$45.00</span>
											</div>
										</div>
										<div class="col-2">
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
										<div class="col-2 ps-5">
											<h6>Apprel</h6>
											<ul class="sub-link">
												<li class="nav-item"><a href="/prada" class="nav-link">Prada</a></li>
												<li class="nav-item"><a href="/gucci" class="nav-link">Gucci</a></li>
												<li class="nav-item"><a href="/chanel" class=" nav-link">Chanel</a></li>
												<li class="nav-item"><a href="#0" class="nav-link">Ganni</a></li>
												<li class="nav-item"><a href="#0" class="nav-link">Zara</a></li>
											</ul>
										</div>
										<div class="col-2">
											<h6>Shoes</h6>
											<ul class="sub-link">
												<li class="nav-item"><a href="#0" class="nav-link">Adidas</a></li>
												<li class="nav-item"><a href="#0" class="nav-link">Nike</a></li>
												<li class="nav-item"><a href="#0" class="nav-link">Puma</a></li>
												<li class="nav-item"><a href="#0" class="nav-link">Gucci</a></li>
												<li class="nav-item"><a href="#0" class="nav-link">Dolce & Gabbana</a></li>
												<li class="nav-item"><a href="#0" class="nav-link">Louis Vulitton</a></li>
											</ul>
										</div>
										<div class="col-2">
											<h6>Цены в: {{ App\Models\Currency::byCode(session('currency', 'RUB'))->first()->symbol }}</h6>
											<ul class="sub-link">
												@foreach(App\Models\Currency::get() as $currency)
												<li class="nav-item"><a href="{{ route('currency', $currency->code) }}" class="nav-link">{{ $currency->symbol }}</a></li>
												@endforeach
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item"><a href="#0" class="nav-link">Disc</a></li>
					</ul>
					<ul class="d-flex gap-4">
						<li class="nav-item position-relative sub">
							<a href="{{ route('categories') }}" class="nav-link">Категории
								<i class="ri-arrow-down-s-line rotate"></i>
							</a>
							<div class="sub-menu">
								<ul class="sub-link">

									@foreach($categories as $category)

									<li class="nav-item" style="line-height: 20px; padding-bottom: 7px"><a href="{{ route('category', $category->code) }}" class="nav-link">{{ $category->name }}</a></li>

									@endforeach

								</ul>
							</div>
						</li>
						<li class="nav-item"><a href="#0" class="nav-link">Sale</a></li>
					</ul>
				</div>
				<div class="branding">Theshop</div>
				<div class="header-right">
					<ul class="d-flex gap-3">
						<li class="nav-item">
							<a href="#0" class="nav-link search-trigger"><i class="ri-search-line"></i></a>
						</li>
						<li class="nav-item">
							<a href="{{ route('basket') }}" class="nav-link position-relative">
								<i class="ri-shopping-bag-line"></i>
								<span class="item-flotaing position-absolute"><span>0</span></span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- Main Section Start here -->
	<main>

		@if(!isset($file))

		<section class="breadcrumb-section">
			<div class="container">
				<div class="breadcrumb-wrapper">
					<ul class="">
						<li><a href="#0">Home</a></li>
						<li><a href="#0">Product</a></li>
						<li>
							<a href="#0"><span>Sweater</span></a>
						</li>
					</ul>
				</div>
			</div>
		</section>

		@endif

		@if(session()->has('success'))

		<p class="alert alert-success" style="text-align: center; margin-top: 20px;">{{ session()->get('success') }}</p>

		@endif
		@if(session()->has('warning'))

		<p class="alert alert-warning" style="text-align: center; margin-top: 20px;">{{ session()->get('warning') }}</p>

		@endif

		@yield('content')

	</main>

	@yield('section-page')

	<!-- Footer section start Here -->
	<footer>
		<section class="footer-section" style="margin-top: 15px;">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12 mb-5 md-lg-0">
						<div class="voucher">
							<h3>Get voucher from us</h3>
							<span>Enter your email below to be the first to know about new collections and product lanches</span>
							<form action="" class="footer-form">
								<div class="email-icon"><i class="ri-mail-line"></i></div>
								<input type="text" class="form-control" placeholder="Enter your Email" />
								<div class="arrow-icon"><i class="ri-arrow-right-line"></i></div>
								<button type="submit">Submit</button>
							</form>
						</div>
					</div>
					<div class="col-lg-2 col-md-4 col-12 ps-lg-3 mb-4">
						<h6>Service</h6>
						<ul class="sub-link pt-2">
							<li class="nav-item"><a href="#0" class="nav-link">About us</a></li>
							<li class="nav-item"><a href="#0" class="nav-link">Careers</a></li>
							<li class="nav-item"><a href="#0" class="nav-link">Delivary Information</a></li>
							<li class="nav-item"><a href="#0" class="nav-link">Terms & Condition</a></li>
							<li class="nav-item"><a href="#0" class="nav-link">Privacy Policy</a></li>
						</ul>
					</div>
					<div class="col-lg-2 col-md-4 col-12 ps-lg-5 mb-4">
						<h6>Pages</h6>
						<ul class="sub-link pt-2">
							<li class="nav-item"><a href="#0" class="nav-link">My Account</a></li>
							<li class="nav-item"><a href="#0" class="nav-link">Login</a></li>
							<li class="nav-item"><a href="#0" class="nav-link">Wishlist</a></li>
							<li class="nav-item"><a href="#0" class="nav-link">Cart</a></li>
							<li class="nav-item"><a href="#0" class="nav-link">Checkout</a></li>
						</ul>
					</div>
					<div class="col-lg-2 col-md-4 col-12 px-lg-0 mb-4">
						<h6>Pages</h6>
						<ul class="sub-link pt-2 pages">
							<li class="nav-item lh-base mb-4">
								Simpang 5 No. 1 <br />
								Centerl Jave - Id
							</li>
							<li class="nav-item"><a href="#0" class="nav-link">+62123456789</a></li>
							<li class="nav-item"><a href="#0" class="nav-link lh-base">hello@youtube.com</a></li>
							<li class="nav-item mt-3">
								Weekdays: 6AM to 6PM <br />
								Saturday: 6AM to 6PM <br />
								Sunday : Clsoed
							</li>
						</ul>
					</div>
				</div>
				<div class="row align-items-center pb-4">
					<div class="col-md-6">
						<ul class="social-link d-flex mb-2 md-md-0">
							<li>
								<a href="#0"><i class="ri-facebook-box-line"></i></a>
							</li>
							<li>
								<a href="#0"><i class="ri-instagram-line"></i></a>
							</li>
							<li>
								<a href="#0"><i class="ri-twitter-line"></i></a>
							</li>
							<li>
								<a href="#0"><i class="ri-pinterest-line"></i></a>
							</li>
						</ul>
					</div>
					<div class="col-md-6">
						<p class="text-md-end copy-right">&copy; - 2023. Pallab - All Rights Reserve</p>
					</div>
				</div>
			</div>
		</section>
	</footer>


	<!-- Small Decive Navaigation menu -->
	<section class="mobile-nav">
		<ul class="mobile-link">
			<li class="nav-item"><a href="#0" class="nav-link">Home</a></li>
			<li class="nav-item nav-toggler">
				<a href="#0" class="nav-link d-flex align-items-center">Product <span class="ms-auto"><i class="ri-arrow-down-s-line rotate"></i></span></a>
				<ul class="mobile-sublink">
					<li class="nav-item"><a href="#0" class="nav-link">Adidas</a></li>
					<li class="nav-item"><a href="#0" class="nav-link">Chanel</a></li>
					<li class="nav-item"><a href="#0" class="nav-link">Dolece & Gabbana</a></li>
					<li class="nav-item"><a href="#0" class="nav-link">ganni</a></li>
					<li class="nav-item"><a href="#0" class="nav-link">Gucchi</a></li>
					<li class="nav-item"><a href="#0" class="nav-link">Louis Vuitton</a></li>
					<li class="nav-item"><a href="#0" class="nav-link">Nike</a></li>
					<li class="nav-item"><a href="#0" class="nav-link">Prada</a></li>
					<li class="nav-item"><a href="#0" class="nav-link">Zara</a></li>
					<li class="nav-item"><a href="#0" class="nav-link">Adidas</a></li>
					<li class="nav-item"><a href="#0" class="nav-link">Chanei</a></li>
					<li class="nav-item"><a href="#0" class="nav-link">Louis Vuitton</a></li>
					<li class="nav-item"><a href="#0" class="nav-link">Nkie</a></li>
					<li class="nav-item"><a href="#0" class="nav-link">Prada</a></li>
					<li class="nav-item"><a href="#0" class="nav-link">Zara</a></li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="#0" class="nav-link">Discount</a>
			</li>
			<li class="nav-item nav-toggler">
				<a href="#0" class="nav-link d-flex align-items-center">Special <span class="ms-auto"><i class="ri-arrow-down-s-line rotate"></i></span></a>
				<ul class="mobile-sublink">
					<li class="nav-item"><a href="#0" class="nav-link">Dolece & Gabbana</a></li>
					<li class="nav-item"><a href="#0" class="nav-link">Louis Vuitton</a></li>
					<li class="nav-item"><a href="#0" class="nav-link">versace</a></li>
					<li class="nav-item"><a href="#0" class="nav-link">Dior</a></li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="#0" class="nav-link">Sale</a>
			</li>
		</ul>
		<div class="register-button">
			<div class="d-grid gap-2">
				<button class="btn seconday-btn" type="button">Login</button>
				<button class="btn seconday-btn-outline" type="button">Register</button>
			</div>
		</div>
		<div class="close">
			<a href="#0" class="close-trigger"><i class="ri-close-line"></i></a>
		</div>
	</section>

	<!-- Search-floation Section Start Here -->
	<section class="search-floating">
		<form action="" class="form-search">
			<div class="search-icon position-absolute">
				<i class="ri-search-line"></i>
			</div>
			<input type="text" name="" id="" class="search" placeholder="Seacrch-product" />
			<div class="search-close position-absolute">
				<i class="ri-close-line search-close"></i>
			</div>
		</form>
	</section>

	<!-- data share seciton start here  -->
	<section id="data-share" class="data-popup data-share">
		<div class="wrap">
			<div class="data-content">
				<a href="#0" class="close"><i class="ri-close-line"></i></a>
				<div class="from mb-2">
					<label for="" class="form-label">Copy Link</label>
					<input type="text" class="" disabled value="https://youtube.com" />
					<i class="ri-file-copy-line"></i>
				</div>
				<div class="media">
					<label for="">Share</label>
					<ul>
						<li>
							<a href="#0"><i class="ri-facebook-line"></i></a>
						</li>
						<li>
							<a href="#0"><i class="ri-instagram-line"></i></a>
						</li>
						<li>
							<a href="#0"><i class="ri-pinterest-line"></i></a>
						</li>
						<li>
							<a href="#0"><i class="ri-youtube-line"></i></a>
						</li>
						<li>
							<a href="#0"><i class="ri-whatsapp-line"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- Ask Question section start here -->
	<section id="data-question" class="data-popup data-question">
		<div class="wrap">
			<div class="data-content">
				<a href="#0" class="close"><i class="ri-close-line"></i></a>

				<div class="question-section">
					<h3 class="text-center mb-4">The Question</h3>
					<form action="">
						<input type="text" class="form-control" placeholder="Name" />
						<div></div>
						<div><input type="email" class="form-control" placeholder="Email" /></div>
						<div><textarea name="" id="" cols="30" rows="8" class="form-control" placeholder="Your Question.."></textarea></div>
						<div class="buttom text-center mt-5">
							<a href="#0" class="seconday-btn">Submit</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<!-- Write Review Section start here -->
	<section id="data-review" class="data-popup data-review">
		<div class="wrap">
			<div class="data-content">
				<a href="#0" class="close"><i class="ri-close-line"></i></a>
				<div class="review-section">
					<h3 class="text-center">Write a Review</h3>
					<form action="" class="review-form">
						<div class="from-wrapper mt-4 mb-4">
							<input type="text" class="form-control" placeholder="Name" />
							<input type="email" class="form-control" placeholder="Email" />
						</div>
						<div class="ratting d-flex align-items-center gap-2 mb-4">
							<span>Your Rating</span>
							<div class="stars">
								<input type="radio" name="rating" id="star5" />
								<label for="star5"><i class="ri-star-fill"></i></label>

								<input type="radio" name="rating" id="star4" />
								<label for="star4"><i class="ri-star-fill"></i></label>

								<input type="radio" name="rating" id="star3" />
								<label for="star3"><i class="ri-star-fill"></i></label>

								<input type="radio" name="rating" id="star2" />
								<label for="star2"><i class="ri-star-fill"></i></label>

								<input type="radio" name="rating" id="star1" />
								<label for="star1"><i class="ri-star-fill"></i></label>
							</div>
						</div>
						<div class="mb-3">
							<input type="text" class="form-control" placeholder="Review Title" />
						</div>
						<div class="mb-5">
							<textarea cols="30" rows="7" class="form-control" placeholder="Your Review is..."></textarea>
						</div>
					</form>
					<div class="button text-center">
						<a href="#0" class="seconday-btn">Submit</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Product cart Section Start Here -->
	<section class="cart-section">
		<div class="wrap">
			<a href="#0" class="close-trigger"><i class="ri-close-line"></i></a>
			<h3>Shopping Cart</h3>
			<div class="cart-content">
				<!-- Cart item 1 -->
				<div class="cart-item mb-4 mt-4 d-flex">
					<div class="inc-dec">
						<button class="decrease">-</button>
						<input type="text" value="1" />
						<button class="increase">+</button>
					</div>
					<div class="cart-img">
						<img src="/images/product_01.jpg" class="img-fluid" alt="" />
					</div>
					<div class="cart-details">
						<h5>The Sweater in Tosca</h5>
						<p class="color">Color: Tosca</p>
						<p class="size">Size: L</p>
						<p class="price">$45.00</p>
					</div>
					<a href="#0" class="cancle"><i class="ri-close-line"></i></a>
				</div>
				<!-- Cart item 2 -->
				<div class="cart-item mb-4 d-flex">
					<div class="inc-dec">
						<button class="decrease">-</button>
						<input type="text" value="1" />
						<button class="increase">+</button>
					</div>
					<div class="cart-img">
						<img src="/images/product_08.jpg" class="img-fluid" alt="" />
					</div>
					<div class="cart-details">
						<h5>The Sweater in Tosca</h5>
						<p class="color">Color: Tosca</p>
						<p class="size">Size: L</p>
						<p class="price">$45.00</p>
					</div>
					<a href="#0" class="cancle"><i class="ri-close-line"></i></a>
				</div>
				<!-- Cart item 3 -->
				<div class="cart-item mb-4 d-flex">
					<div class="inc-dec">
						<button class="decrease">-</button>
						<input type="text" value="1" />
						<button class="increase">+</button>
					</div>
					<div class="cart-img">
						<img src="/images/product_03.jpg" class="img-fluid" alt="" />
					</div>
					<div class="cart-details">
						<h5>The Sweater in Tosca</h5>
						<p class="color">Color: Tosca</p>
						<p class="size">Size: L</p>
						<p class="price">$45.00</p>
					</div>
					<a href="#0" class="cancle"><i class="ri-close-line"></i></a>
				</div>
				<!-- Cart item 1 -->
				<div class="cart-item mb-4 d-flex">
					<div class="inc-dec">
						<button class="decrease">-</button>
						<input type="text" value="1" />
						<button class="increase">+</button>
					</div>
					<div class="cart-img">
						<img src="/images/product_07.jpg" class="img-fluid" alt="" />
					</div>
					<div class="cart-details">
						<h5>The Sweater in Tosca</h5>
						<p class="color">Color: Tosca</p>
						<p class="size">Size: L</p>
						<p class="price">$45.00</p>
					</div>
					<a href="#0" class="cancle"><i class="ri-close-line"></i></a>
				</div>
			</div>
			<div class="coupon-section">
				<input type="text" class="form-control" placeholder="Coupon" />
				<div class="button">
					<button class="coupon-btn" type="submit">Apply</button>
				</div>
			</div>
			<div class="subtotal-section mt-3">
				<span class="subtotal">Subtotal</span>
				<ul class="ps-3">
					<span class="shipping">Shipping</span>
					<li class="d-flex justify-content-between mb-1">
						<div>
							<input type="radio" id="free" name="shipping" />
							<label for="free">Free</label>
						</div>
						<span class="">$0.00</span>
					</li>
					<li class="d-flex justify-content-between mb-1">
						<div>
							<input type="radio" id="flat" name="shipping" />
							<label for="flat">Flat</label>
						</div>
						<span class="">$147.00</span>
					</li>
					<li class="d-flex justify-content-between mb-1">
						<span>Promo discount</span>
						<span>-$0.00</span>
					</li>
				</ul>
				<div class="total d-flex justify-content-between">
					<span>Total</span>
					<span>$147.00</span>
				</div>
			</div>
			<div class="checkout-box mt-4">
				<div class="button">
					<a href="#0" class="ocean-btn">Checkout</a>
				</div>
				<div class="button">
					<a href="#0" class="view-cart">View Cart</a>
				</div>
			</div>
		</div>
	</section>


	<!-- Overlay Section Start Here -->
	<section class="overlay"></section>
	<!-- Bootstrap js cdn link -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

	<!-- fslightbox cdn link -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.3.1/index.js"></script>

	<!-- Swiper js cdn link -->
	<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
	<!-- Custom js link -->
	<script src="/js/main.js"></script>
	<script src="/js/nouislider.min.js"></script>

</body>

</html>