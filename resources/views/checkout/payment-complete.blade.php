@extends('layouts.base_layout')

@section('title')
	{{ __('payment.seo-title-payment-complete') }}
@endsection

@section('description')
	{{ __('payment.seo-description-payment-complete') }}
@endsection

@section('robots-behaviour')
	noindex, nofollow
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs pattern-bg">
		<div class="benu-container breadcrumbs__content flex justify-start">
			<a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('payment-processed-'.app()->getLocale(), ['order' => $url_order]) }}" class="primary-color"><strong>{{ __('breadcrumbs.validated-payment') }}</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
	<section class="benu-container payment-confirmation">
		<h3 class="payment-confirmation__subtitle">
			{!! __('payment.confirmation-congrats') !!}
		</h3>
		<h1 class="payment-confirmation__title">
			{!! __('payment.confirmation-order-validated') !!}
		</h1>

		<p class="payment-confirmation__order-number">
			{!! __('payment.confirmation-order-number') !!} {{ $order->unique_id }}
		</p>
		<p class="payment-confirmation__order-infos">
			{!! __('payment.confirmation-total-price') !!} <strong class="primary-color">{{ $order->total_price }}&euro;</strong>
		</p>
		<p class="payment-confirmation__order-infos mb-7">
			{!! __('payment.confirmation-payment-method') !!} <strong class="primary-color">
			@if($order->payment_type == '0')
			{!! __('payment.confirmation-credit-card') !!} - {!! __('payment.confirmation-payment-ok') !!}
			@elseif($order->payment_type == '1')
			{!! __('payment.confirmation-paypal') !!} - {!! __('payment.confirmation-payment-ok') !!}
			@elseif($order->payment_type == '2')
			{!! __('payment.confirmation-digicash') !!} - {!! __('payment.confirmation-payment-ok') !!}
			@elseif($order->payment_type == '3')
			{!! __('payment.confirmation-bank-transfer') !!} - {!! __('payment.confirmation-payment-pending') !!}
			@else
			{!! __('payment.confirmation-payment-pending') !!}
			@endif
			</strong>
		</p>
		<p class="payment-confirmation__txt-details">
			{!! __('payment.confirmation-email-confirmation') !!} {{ $order->user->email }}
		</p>
		<p class="payment-confirmation__txt-details">
			{!! __('payment.confirmation-email-info') !!}
		</p>
		<div class="payment-confirmation__links flex justify-around flex-wrap">
			@auth
			<div class="text-center">
				<a href="{{ route('dashboard', ['locale' => app()->getLocale()]) }}" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover">{!! __('payment.confirmation-go-to-dashboard') !!}</a>
			</div>
			<div class="text-center">
				<a href="{{ route('dashboard', ['locale' => app()->getLocale(), 'section' => 'orders']) }}" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover">{!! __('payment.confirmation-see-all-orders') !!}</a>
			</div>
			@endauth

			<div class="text-center">
				<a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="btn-couture-plain btn-couture-plain--fit btn-couture-plain--dark-hover">{!! __('payment.confirmation-back-to-home') !!}</a>
			</div>
		</div>
	</section>
@endsection

@section('scripts')
@endsection