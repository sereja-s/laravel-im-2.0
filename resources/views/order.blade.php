@extends('layouts.master')

@section('title', 'Оформить заказ')

@section('content')
<!-- heading section Start here -->
<section class="section-heading my-5">
	<section class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="text-center">Оформление заказа</h3>
			</div>
		</div>
	</section>
</section>

<!-- Checkout section start Here -->
<section class="container">
	<div class="row">
		<div class="col-lg-6 col-12 mb-lg-0 mb-5">
			<h3 class="mb-4">Детали заказа</h3>
			<div class="checkout-form">
				<form action="{{ route('basket-confirm') }}" method="POST">

					<div class="row g-3 mb-3">
						<div class="col-md-6 col-12">
							<label for="" class="form-label">Имя*</label>
							<input type="text" name="name" class="form-control" placeholder="Ваше имя" />
						</div>
						<!-- <div class="col-md-6 col-12">
								<label for="" class="form-label">Last Name*</label>
								<input type="text" class="form-control" placeholder="Last name" aria-label="Last name" />
							</div> -->
					</div>
					<div class="row g-3 mb-3">
						<div class="col-md-6 col-12">
							<label for="" class="form-label">Телефон*</label>
							<input type="tel" name="phone" class="form-control" placeholder="Ваш телефон" />
						</div>
						<div class="col-md-6 col-12">
							<label for="" class="form-label">Email*</label>
							<input type="email" name="email" class="form-control" placeholder="Ваша эл.почта" />
						</div>
					</div>
					<!-- <div class="mb-3">
						<label for="" class="form-label">Адрес</label>
						<textarea class="form-control" name="address" placeholder="Адрес доставки"></textarea>
					</div> -->
					<!-- <div class="subtotal-section">
						<ul>
							<li><input type="radio" id="account" /> <label for="account">Create an account?</label></li>
						</ul>
					</div> -->
					@csrf

					<div class="checkout-box mt-4">
						<div class="button">
							<input type="submit" value="Сделать заказ" class="ocean-btn">
						</div>
					</div>

				</form>
			</div>
		</div>
		<div class="col-lg-6 col-12 ps-lg-5">
			<!-- <div class="order-summary">
				<h3 class="mb-5">Order Summary</h3>
				
				<div class="item">
					<div class="d-flex">
						<div class="order-img">
							<img src="/images/product_01.jpg" class="img-fluid" alt="" />
							<span class="item-flotaing"><span>x1</span></span>
						</div>
						<div class="order-content ms-lg-5 ms-0 ps-lg-0 ps-4">
							<h6>The Sweater in Tosca</h6>
							<p>Color: Blue</p>
							<p>Size : L</p>
							<p class="price">$45.00</p>
						</div>
					</div>
				</div>
				
				<div class="item">
					<div class="d-flex">
						<div class="order-img">
							<img src="/images/product_07.jpg" class="img-fluid" alt="" />
							<span class="item-flotaing"><span>x1</span></span>
						</div>
						<div class="order-content ms-lg-5 ms-0 ps-lg-0 ps-4">
							<h6>Solid Pink GIO</h6>
							<p>Color: Tosca</p>
							<p>Size : L</p>
							<p class="price">$57.00</p>
						</div>
					</div>
				</div>
				
				<div class="item">
					<div class="d-flex">
						<div class="order-img">
							<img src="/images/product_04.jpg" class="img-fluid" alt="" />
							<span class="item-flotaing"><span>x1</span></span>
						</div>
						<div class="order-content ms-lg-5 ms-0 ps-lg-0 ps-4">
							<h6>The Sweater in Tosca</h6>
							<p>Color: Tosca</p>
							<p>Size : L</p>
							<p class="price">$45.00</p>
						</div>
					</div>
				</div>
			</div> -->

			<div class="payment-section">
				<!-- <div class="payment-method">
					<span>Select Payment</span>
					<ul class="d-flex justify-content-center align-items-center">
						<li>
							<input type="radio" name="pay-option" id="cc" />
							<label for="cc"><i class="ri-bank-card-line"></i></label>
						</li>
						<li>
							<input type="radio" name="pay-option" id="pp" />
							<label for="pp"><i class="ri-paypal-line"></i></label>
						</li>
						<li>
							<input type="radio" name="pay-option" id="cod" />
							<label for="cod"><i class="ri-hand-coin-line"></i></label>
						</li>
					</ul>
					</div> -->

				@if(!$order->hasCoupon())

				<div class="coupon-section mb-4">

					<form method="POST" action="{{ route('set-coupon') }}">
						@csrf

						<input type="text" name="coupon" class="form-control" placeholder="введите ваш купон" />
						<div class="button">
							<button class="coupon-btn" type="submit">Применить</button>
						</div>

					</form>

				</div>

				@error('coupon')

				<div class="alert alert-danger">{{ $message }}</div>

				@enderror

				@else

				<h4 style="color: white; ">Вы используете купон: {{ $order->coupon->code }}</h4>

				@endif

				<div class="subtotal-section mt-3">

					@if($order->hasCoupon())

					<div class="d-flex justify-content-between align-items-center">
						<span class="subtotal">Стоимость заказа:</span>
						<span>{{ $order->getFullSum(false) }} {{ $currencySymbol }}</span>
					</div>

					<div class="d-flex justify-content-between align-items-center">
						<span class="tax">Скидка по купону:</span>
						<span>{{ $order->coupon->value }} @if($order->coupon->isAbsolute()) {{ $currencySymbol }} @else % @endif</span>
					</div>
					<!-- <ul class="">
							<span class="shipping">Shipping</span>
							<li class="d-flex justify-content-between mb-1 ps-3">
								<div>
									<input type="radio" id="free" name="shipping" />
									<label for="free">Free</label>
								</div>
								<span class="">$0.00</span>
							</li>
							<li class="d-flex justify-content-between mb-1 ps-3">
								<div>
									<input type="radio" id="flat" name="shipping" />
									<label for="flat">Flat</label>
								</div>
								<span class="">$10.00</span>
							</li>
							<li class="d-flex justify-content-between mb-1">
								<span>Promo discount</span>
								<span>-$0.00</span>
							</li>
						</ul> -->
					<div class="total d-flex justify-content-between">
						<span>Total</span>
						<span>{{ $order->getFullSum() }} {{ $currencySymbol }}</span>
					</div>

					@else

					<div class="d-flex justify-content-between align-items-center">
						<span class="subtotal">Стоимость заказа:</span>
						<span>{{ $order->getFullSum() }} {{ $currencySymbol }}</span>
					</div>

					@endif
					<!-- <div class="checkout-box mt-4">
						<div class="button">
							<a href="#0" class="ocean-btn">Заказать</a>
						</div>
					</div> -->
				</div>
			</div>



		</div>
	</div>
</section>
@endsection