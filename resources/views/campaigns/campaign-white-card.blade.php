@extends('layouts.base_layout')

@section('title')
	{{ __('campaigns.single-white-card-seo-title') }}
@endsection

@section('description')
	{{ __('campaigns.single-white-card-seo-desc') }}
@endsection

@section('breadcrumbs')
<!-- 	<div class="breadcrumbs pattern-bg">
		<div class="benu-container breadcrumbs__content flex justify-start">
			<a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('campaigns-'.app()->getLocale()) }}">{{ __('breadcrumbs.campaigns-all') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('campaign-single-'.app()->getLocale(), ['slug' => __('campaigns.single-slug-white-card')]) }}" class="primary-color"><strong>{{ __('breadcrumbs.campaign-single-white-card') }}</strong></a>
		</div>
	</div> -->
@endsection

@section('main-content')
	<div class="single-campaign">
		<section class="single-campaign__header">
			<img src="{{ asset('images/pictures/campaigns/DSC09261006.png') }}" />
			<div class="single-campaign__header__opacifier"></div>
			<div class="w-11/12 md:4/5 lg:w-1/2 m-auto single-campaign__header__txt-container">
				<h3 class="single-campaign__header__toptitle">{{ __('campaigns.carte-blanche-main-picture-top-title') }}</h3>
				<h2 class="single-campaign__header__title">{{ __('campaigns.carte-blanche-main-picture-title') }}</h2>
				<h1 class="single-campaign__header__subtitle">{{ __('campaigns.carte-blanche-main-picture-subtitle') }}</h1>

				<p class="single-campaign__header__txt">
					{{ __('campaigns.carte-blanche-txt-1') }}
				</p>

				<p class="single-campaign__header__txt">
					{{ __('campaigns.carte-blanche-txt-2-1') }} <a href="#">{{ __('campaigns.carte-blanche-link-1') }}</a> {{ __('campaigns.carte-blanche-txt-2-2') }} <a href="#">{{ __('campaigns.carte-blanche-link-2') }}</a> {{ __('campaigns.carte-blanche-txt-2-3') }}
				</p>

				<p class="single-campaign__header__txt">
					{{ __('campaigns.carte-blanche-txt-3') }}
				</p>
			</div>
		</section>

		<section class="single-campaign__section-1 benu-container">
			<div class="flex justify-start flex-wrap">
				<div class="single-campaign__section-1__txt flex flex-col lg:justify-end">
					<p>
						{{ __('campaigns.carte-blanche-txt-4') }}
					</p>
					<p>
						{{ __('campaigns.carte-blanche-txt-5') }}
					</p>
				</div>
				<div class="single-campaign__section-1__picture">
					<img src="{{ asset('images/pictures/campaigns/couture_campaign_02.jpeg') }}" class="single-campaign__section-1__picture__img" />
					<div class="single-campaign__section-1__picture__txt-container flex flex-col justify-center">
						<p class="single-campaign__section-1__picture__txt single-campaign__section-1__picture__txt--base">
							{{ __('campaigns.carte-blanche-txt-6') }}
						</p>
						<p class="single-campaign__section-1__picture__txt single-campaign__section-1__picture__txt--hover">
							{{ __('campaigns.carte-blanche-txt-6') }}
						</p>
					</div>
				</div>
			</div>
		</section>

		<section class="single-campaign__transition-1">
			<img src="{{ asset('images/pictures/campaigns/DSC09261006.png') }}" />
			<div class="single-campaign__transition-1__opacifier"></div>
			<div class="w-4/5 lg:w-1/2 m-auto single-campaign__transition-1__txt-container flex flex-col justify-center">
				<h2 class="single-campaign__transition-1__title">{{ __('campaigns.carte-blanche-transition-1-title') }}</h2>
			</div>
		</section>

		<section class="single-campaign__section-2 benu-container">
			<div class="flex justify-start flex-wrap">
				<div class="single-campaign__section-2__picture">
					<img src="{{ asset('images/pictures/campaigns/couture_campaign_02.jpeg') }}" class="single-campaign__section-2__picture__img" />
				</div>
				<div class="single-campaign__section-2__txt flex flex-col lg:justify-end">
					<h4>
						{{ __('campaigns.carte-blanche-section-2-title') }}
					</h4>
					<p>
						{{ __('campaigns.carte-blanche-txt-7') }}
					</p>
					<p>
						{{ __('campaigns.carte-blanche-txt-8') }}
					</p>
					<p>
						{{ __('campaigns.carte-blanche-txt-9') }}
					</p>
					<p>
						{{ __('campaigns.carte-blanche-txt-10') }}
					</p>
				</div>
			</div>
		</section>

		<section class="single-campaign__section-3">
			<img src="{{ asset('images/pictures/campaigns/DSC09261006.png') }}" />
			<div class="single-campaign__section-3__opacifier"></div>
			<div class="w-11/12 md:4/5 lg:w-1/2 m-auto single-campaign__section-3__txt-container">
				<h2 class="single-campaign__section-3__title">{{ __('campaigns.carte-blanche-section-3-title') }}</h2>

				<p class="single-campaign__section-3__txt">
					{{ __('campaigns.carte-blanche-txt-11') }}
				</p>

				<p class="single-campaign__section-3__txt">
					{{ __('campaigns.carte-blanche-txt-12') }}
				</p>
			</div>
		</section>

		<section class="single-campaign__section-4">
			<blockquote class="single-campaign__section-4__quote w-11/12 md:4/5 lg:w-1/2 m-auto">
				{{ __('campaigns.carte-blanche-quote-1') }} <span class="single-campaign__section-4__quote--highlight">{{ __('campaigns.carte-blanche-quote-2') }}</span> {{ __('campaigns.carte-blanche-quote-3') }}
			</blockquote>
			<div class="single-campaign__section-4__separator"></div>
			<p class="single-campaign__section-4__signature">
				{{ __('campaigns.carte-blanche-quote-signature') }}
			</p>

			<div class="single-campaign__section-4__quote-2">
				<p class="single-campaign__section-4__quote-2__symbols">
					&bdquo;&bdquo;
				</p>
				<p class="single-campaign__section-4__quote-2__txt">
					{{ __('campaigns.carte-blanche-quote-2-txt') }}
				</p>
				<p class="single-campaign__section-4__quote-2__signature">
					{{ __('campaigns.carte-blanche-quote-2-signature') }}
				</p>
			</div>
		</section>

		<div class="single-campaign__prev-next">
			
		</div>

		<div class="text-center mb-10">
			<a href="{{ route('campaigns-'.app()->getLocale()) }}" class="btn-slider-left text-lg font-bold m-auto">{{ __('campaigns.all-campaigns-link') }}</a>
		</div>
	</div>
@endsection

@section('scripts')

@endsection