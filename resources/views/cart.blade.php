@extends('layouts.base_layout')

@section('title')
	{{ __('cart.seo-title') }}
@endsection

@section('description')
	{{ __('cart.seo-description') }}
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs pattern-bg">
		<div class="benu-container breadcrumbs__content flex justify-start">
			<a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('cart-'.app()->getLocale()) }}" class="primary-color"><strong>{{ __('breadcrumbs.cart') }}</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
<div class="flex justify-between benu-container mb-10 pb-10">
	<section class="cart-content">
		<h1>{{ __('cart.your-cart') }}</h1>

		@if($cart_id == 0 || $cart_count == 0)
			<p>
				<em>{{ __('cart.no-article-for-the-moment') }}...</em>
			</p>
			<p class="text-center mt-5 pt-5">
				<a href="{{ route('model-'.app()->getLocale()) }}" class="btn-couture">{{ __('welcome.last-link') }}</a>
			</p>
		@else
			<h2 class="cart-content__banner cart-content__banner--couture">BENU COUTURE</h2>
			@livewire('cart.cart-articles', ['cart_id' => $cart_id])
		@endif
	</section>

	<section class="cart-summary-container">
		<div class="cart-summary-container__sticky-container">
			@livewire('cart.cart-summary', ['cart_id' => $cart_id])

			<div class="cart-client-service flex justify-center flex-wrap">
				<div>
					@svg('svg_conseil_tel')
					<p>{{ __('cart.service-tel') }}</p>
				</div>
				<div>
					@svg('svg_garantie_vie')
					<p>{{ __('cart.service-warranty') }}</p>
				</div>
				<div>
					@svg('svg_pickup_store')
					<p>{{ __('cart.service-pickup') }}</p>
				</div>
				<div>
					@svg('svg_voucher')
					<p>{{ __('cart.service-voucher') }}</p>
				</div>
				<div>
					@svg('svg_kulturpass')
					<p>{{ __('cart.service-kulturpass') }}</p>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection

@section('scripts')
@endsection