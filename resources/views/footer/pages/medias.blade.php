@extends('layouts.base_layout')

@section('title')
	{{ __('footer.medias-seo-title') }}
@endsection

@section('description')
	{{ __('footer.medias-seo-description') }}
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs pattern-bg">
		<div class="benu-container breadcrumbs__content flex justify-start">
			<a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('footer.medias-'.app()->getLocale()) }}" class="primary-color"><strong>{{ __('breadcrumbs.medias') }}</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
	<section class="footer-medias w-4/5 lg:w-1/2 m-auto">
		<h3 class="footer-medias__subtitle">{{ __('footer.medias-subtitle') }}</h3>
		<h1 class="footer-medias__title">{{ __('footer.medias-title') }}</h1>
		<p class="footer-medias__paragraph">
			{{ __('footer.medias-txt-1') }}
		</p>
		<ul class="faq__accordion">
			<li>
				<div class="faq__accordion__header flex justify-between">
					<p class="faq__accordion__header__title">{{ __('footer.medias-section-title-1') }}</p>
					<p class="faq__accordion__header__arrow flex flex-col justify-center">
						<img src="{{ asset('images/pictures/chevron_bottom_white.png') }}" class="faq__accordion__header__chevron">
					</p>
				</div>

				<div class="faq__accordion__answer mb-10" style="display: none; margin-bottom: 40px;">
					<p class="faq__accordion__answer__txt">
						{{ __('footer.medias-section-1-txt-1') }}
					</p>
					<div class="flex">
						
					</div>
				</div>
			</li>

			<li>
				<div class="faq__accordion__header flex justify-between">
					<p class="faq__accordion__header__title">{{ __('footer.medias-section-title-2') }}</p>
					<p class="faq__accordion__header__arrow flex flex-col justify-center">
						<img src="{{ asset('images/pictures/chevron_bottom_white.png') }}" class="faq__accordion__header__chevron">
					</p>
				</div>

				<div class="faq__accordion__answer mb-10" style="display: none; margin-bottom: 40px;">
					<p class="faq__accordion__answer__txt">
						{{ __('footer.medias-section-2-txt-1') }}
					</p>
					<div class="flex">
						
					</div>
				</div>
			</li>

			<li>
				<div class="faq__accordion__header flex justify-between">
					<p class="faq__accordion__header__title">{{ __('footer.medias-section-title-3') }}</p>
					<p class="faq__accordion__header__arrow flex flex-col justify-center">
						<img src="{{ asset('images/pictures/chevron_bottom_white.png') }}" class="faq__accordion__header__chevron">
					</p>
				</div>

				<div class="faq__accordion__answer" style="display: none; margin-bottom: 40px;">
					<p class="faq__accordion__answer__txt">
						{{ __('footer.medias-section-3-txt-1') }}
					</p>
					<div class="flex">
						
					</div>
				</div>
			</li>
		</ul>
	</section>
@endsection

@section('scripts')
@endsection