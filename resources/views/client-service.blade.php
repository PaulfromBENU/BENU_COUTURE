@extends('layouts.base_layout')

@section('title')
	{{ __('service.seo-title') }}
@endsection

@section('description')
	{{ __('service.seo-description') }}
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs pattern-bg">
		<div class="benu-container breadcrumbs__content flex justify-start">
			<a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('client-service', [app()->getLocale()]) }}">{{ __('breadcrumbs.client-service') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			@switch($page)
				@case('faq')
					<a href="{{ route('client-service', ['locale' => app()->getLocale(), 'page' => 'faq']) }}" class="primary-color"><strong>{{ __('breadcrumbs.faq') }}</strong></a>
					@break

				@case('delivery')
					<a href="{{ route('client-service', ['locale' => app()->getLocale(), 'page' => 'delivery']) }}" class="primary-color"><strong>{{ __('breadcrumbs.delivery') }}</strong></a>
					@break

				@case('sizes')
					<a href="{{ route('client-service', ['locale' => app()->getLocale(), 'page' => 'sizes']) }}" class="primary-color"><strong>{{ __('breadcrumbs.sizes') }}</strong></a>
					@break

				@case('return')
					<a href="{{ route('client-service', ['locale' => app()->getLocale(), 'page' => 'return']) }}" class="primary-color"><strong>{{ __('breadcrumbs.return') }}</strong></a>
					@break

				@case('payment')
					<a href="{{ route('client-service', ['locale' => app()->getLocale(), 'page' => 'payment']) }}" class="primary-color"><strong>{{ __('breadcrumbs.payment') }}</strong></a>
					@break

				@case('care')
					<a href="{{ route('client-service', ['locale' => app()->getLocale(), 'page' => 'care']) }}" class="primary-color"><strong>{{ __('breadcrumbs.care') }}</strong></a>
					@break

				@case('shops')
					<a href="{{ route('client-service', ['locale' => app()->getLocale(), 'page' => 'shops']) }}" class="primary-color"><strong>{{ __('breadcrumbs.shops') }}</strong></a>
					@break

				@case('contact')
					<a href="{{ route('client-service', ['locale' => app()->getLocale(), 'page' => 'contact']) }}" class="primary-color"><strong>{{ __('breadcrumbs.contact') }}</strong></a>
					@break

				@default
					<a href="{{ route('client-service', ['locale' => app()->getLocale(), 'page' => 'contact']) }}" class="primary-color"><strong>{{ __('breadcrumbs.contact') }}</strong></a>
					@break
			@endswitch
		</div>
	</div>
@endsection

@section('main-content')
	<div class="benu-container text-center service">
		<h4 class="service__subtitle">BENU COUTURE</h4>
		<h2 class="service__title">Service Client</h2>
		<div class="service__nav flex justify-center">
			<a href="{{ route('client-service', ['locale' => app()->getLocale(), 'page' => 'faq']) }}" class="service__nav__link @if($page == 'faq') service__nav__link--active @endif" id="service-nav-faq">
				{{ __('breadcrumbs.faq') }}
			</a>
			<a href="{{ route('client-service', ['locale' => app()->getLocale(), 'page' => 'delivery']) }}" class="service__nav__link @if($page == 'delivery') service__nav__link--active @endif" id="service-nav-delivery">
				{{ __('breadcrumbs.delivery') }}
			</a>
			<a href="{{ route('client-service', ['locale' => app()->getLocale(), 'page' => 'sizes']) }}" class="service__nav__link @if($page == 'sizes') service__nav__link--active @endif" id="service-nav-sizes">
				{{ __('breadcrumbs.sizes') }}
			</a>
			<a href="{{ route('client-service', ['locale' => app()->getLocale(), 'page' => 'return']) }}" class="service__nav__link @if($page == 'return') service__nav__link--active @endif" id="service-nav-return">
				{{ __('breadcrumbs.return') }}
			</a>
			<a href="{{ route('client-service', ['locale' => app()->getLocale(), 'page' => 'payment']) }}" class="service__nav__link @if($page == 'payment') service__nav__link--active @endif" id="service-nav-payment">
				{{ __('breadcrumbs.payment') }}
			</a>
			<a href="{{ route('client-service', ['locale' => app()->getLocale(), 'page' => 'care']) }}" class="service__nav__link @if($page == 'care') service__nav__link--active @endif" id="service-nav-care">
				{{ __('breadcrumbs.care') }}
			</a>
			<a href="{{ route('client-service', ['locale' => app()->getLocale(), 'page' => 'shops']) }}" class="service__nav__link @if($page == 'shops') service__nav__link--active @endif" id="service-nav-shops">
				{{ __('breadcrumbs.shops') }}
			</a>
			<a href="{{ route('client-service', ['locale' => app()->getLocale(), 'page' => 'contact']) }}" class="service__nav__link @if($page == '' || $page == 'contact') service__nav__link--active @endif" id="service-nav-contact">
				{{ __('breadcrumbs.contact') }}
			</a>
		</div>
	</div>

	@switch($page)
		@case('faq')
			@include('includes.services.faq')
			@break

		@case('delivery')
			@include('includes.services.delivery')
			@break

		@case('sizes')
			@include('includes.services.sizes')
			@break

		@case('return')
			@include('includes.services.return')
			@break

		@case('payment')
			@include('includes.services.payment')
			@break

		@case('care')
			@include('includes.services.care')
			@break

		@case('shops')
			@include('includes.services.shops')
			@break

		@case('contact')
			@include('includes.services.contact')
			@break

		@default
			@include('includes.services.contact')
			@break
	@endswitch
@endsection

@section('scripts')
<script type="text/javascript">
	$(function() {
		$('.service__nav__link').on('click', function() {
			$('.service__nav__link').removeClass('service__nav__link--active');
			$(this).addClass('service__nav__link--active');
		});
	});
</script>
@endsection