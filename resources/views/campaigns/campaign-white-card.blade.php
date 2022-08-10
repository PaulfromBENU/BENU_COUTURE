@extends('layouts.base_layout')

@section('title')
	{{ __('campaigns.single-white-card-seo-title') }}
@endsection

@section('description')
	{{ __('campaigns.single-white-card-seo-desc') }}
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs pattern-bg">
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
	</div>
@endsection

@section('main-content')
	<div class="text-center single-campaign w-2/3 md:w-3/4 lg:w-2/3 m-auto">
		<h4 class="single-campaign__subtitle">{{ __('campaigns.single-white-card-subtitle') }}</h4>
		<h2 class="single-campaign__title">{{ __('campaigns.single-white-card-title') }}</h2>
	</div>
@endsection

@section('scripts')

@endsection