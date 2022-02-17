@extends('layouts.base_layout')

@section('title')
	{{ __('services.seo-title') }}
@endsection

@section('description')
	{{ __('services.seo-description') }}
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs pattern-bg">
		<div class="benu-container breadcrumbs__content flex justify-start">
			<a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('client-service-'.app()->getLocale()) }}">{{ __('breadcrumbs.client-service') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			@switch($page)
				@case(__('slugs.services-faq'))
					<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-faq')]) }}" class="primary-color"><strong>{{ __('breadcrumbs.faq') }}</strong></a>
					@break

				@case(__('slugs.services-delivery'))
					<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-delivery')]) }}" class="primary-color"><strong>{{ __('breadcrumbs.delivery') }}</strong></a>
					@break

				@case(__('slugs.services-sizes'))
					<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-sizes')]) }}" class="primary-color"><strong>{{ __('breadcrumbs.sizes') }}</strong></a>
					@break

				@case(__('slugs.services-return'))
					<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-return')]) }}" class="primary-color"><strong>{{ __('breadcrumbs.return') }}</strong></a>
					@break

				@case(__('slugs.services-payment'))
					<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-payment')]) }}" class="primary-color"><strong>{{ __('breadcrumbs.payment') }}</strong></a>
					@break

				@case(__('slugs.services-care'))
					<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-care')]) }}" class="primary-color"><strong>{{ __('breadcrumbs.care') }}</strong></a>
					@break

				@case(__('slugs.services-shops'))
					<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-shops')]) }}" class="primary-color"><strong>{{ __('breadcrumbs.shops') }}</strong></a>
					@break

				@case(__('slugs.services-contact'))
					<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-contact')]) }}" class="primary-color"><strong>{{ __('breadcrumbs.contact') }}</strong></a>
					@break

				@default
					<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-faq')]) }}" class="primary-color"><strong>{{ __('breadcrumbs.faq') }}</strong></a>
					@break
			@endswitch
		</div>
	</div>
@endsection

@section('main-content')
	<div class="benu-container text-center service">
		<h4 class="service__subtitle">BENU COUTURE</h4>
		<h2 class="service__title">{{ __('services.main-title') }}</h2>
		<div class="service__nav flex justify-center">
			<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-faq')]) }}" class="service__nav__link @if($page == '' || $page == __('slugs.services-faq')) service__nav__link--active @endif" id="service-nav-faq">
				{{ __('services.nav-faq') }}
			</a>
			<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-delivery')]) }}" class="service__nav__link @if($page == __('slugs.services-delivery')) service__nav__link--active @endif" id="service-nav-delivery">
				{{ __('services.nav-delivery') }}
			</a>
			<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-sizes')]) }}" class="service__nav__link @if($page == __('slugs.services-sizes')) service__nav__link--active @endif" id="service-nav-sizes">
				{{ __('services.nav-sizes') }}
			</a>
			<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-return')]) }}" class="service__nav__link @if($page == __('slugs.services-return')) service__nav__link--active @endif" id="service-nav-return">
				{{ __('services.nav-return') }}
			</a>
			<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-payment')]) }}" class="service__nav__link @if($page == __('slugs.services-payment')) service__nav__link--active @endif" id="service-nav-payment">
				{{ __('services.nav-payment') }}
			</a>
			<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-care')]) }}" class="service__nav__link @if($page == __('slugs.services-care')) service__nav__link--active @endif" id="service-nav-care">
				{{ __('services.nav-care') }}
			</a>
			<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-shops')]) }}" class="service__nav__link @if($page == __('slugs.services-shops')) service__nav__link--active @endif" id="service-nav-shops">
				{{ __('services.nav-shops') }}
			</a>
			<a href="{{ route('client-service-'.app()->getLocale(), ['page' => __('slugs.services-contact')]) }}" class="service__nav__link @if($page == __('slugs.services-contact')) service__nav__link--active @endif" id="service-nav-contact">
				{{ __('services.nav-contact') }}
			</a>
		</div>
	</div>

	@switch($page)
		@case(__('slugs.services-faq'))
			@include('includes.services.faq')
			@break

		@case(__('slugs.services-delivery'))
			@include('includes.services.delivery')
			@break

		@case(__('slugs.services-sizes'))
			@include('includes.services.sizes')
			@break

		@case(__('slugs.services-return'))
			@include('includes.services.return')
			@break

		@case(__('slugs.services-payment'))
			@include('includes.services.payment')
			@break

		@case(__('slugs.services-care'))
			@include('includes.services.care')
			@break

		@case(__('slugs.services-shops'))
			@include('includes.services.shops')
			@break

		@case(__('slugs.services-contact'))
			@include('includes.services.contact')
			@break

		@default
			@include('includes.services.faq')
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