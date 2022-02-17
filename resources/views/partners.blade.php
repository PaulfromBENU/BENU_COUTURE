@extends('layouts.base_layout')

@section('title')
	{{ __('partners.seo-title') }}
@endsection

@section('description')
	{{ __('partners.seo-description') }}
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs pattern-bg">
		<div class="benu-container breadcrumbs__content flex justify-start">
			<a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('partners-'.app()->getLocale()) }}" class="primary-color"><strong>{{ __('breadcrumbs.partners') }}</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
	<section class="partners flex justify-between benu-container">
		<div class="w-1/5">
			<h2 class="partners__side-title">{{ __('partners.title') }}</h2>
			<p class="partners__side-txt">
				{{ __('partners.side-txt') }}
			</p>
		</div>
		<div class="w-9/12">
			@foreach($partners as $partner)
			<div class="partners__box flex justify-start">
				<div class="partners__box__img-container">
					<img src="{{ asset('images/pictures/partners/'.$partner->picture) }}">
				</div>
				<div class="partners__box__txt-container">
					<div class="flex justify-between">
						<h3 class="partners__box__title">{{ $partner->name }}</h3>
						<p>
							<a href="{{ route('model-'.app()->getLocale(), ['partners' => $partner->filter_key]) }}" class="btn-couture-plain">{{ __('partners.see-articles-link') }}</a>
						</p>
					</div>
					<p class="partners__box__desc">
						{{ $partner->$desc_query }}
					</p>
					<div class="text-left partners__box__highlight">
						<div class="flex justify-start">
							<p class="w-7/12 mb-2">
								<strong>{!! __('partners.address') !!}:</strong> {{ $partner->address }}
							</p>
							<p>
								<strong>{!! __('partners.email') !!}:</strong> <span class="primary-color"><a href="mailto:{{ $partner->email }}" class="partners__box__link" target="_blank">{{ $partner->email }}</a></span>
							</p>
						</div>
						<div class="flex justify-start">
							<p class="w-7/12">
								<strong>{!! __('partners.phone') !!}:</strong> {{ $partner->email }}
							</p>
							<p>
								<strong>{!! __('partners.website') !!}:</strong> <span class="primary-color"><a href="https://{{ $partner->website }}" class="partners__box__link" target="_blank">{{ $partner->website }}</a></span>
							</p>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</section>
@endsection

@section('scripts')

@endsection