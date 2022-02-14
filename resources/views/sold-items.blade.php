@extends('layouts.base_layout')

@section('title')
	{{ __('sold.seo-title', ['name' => 'Caretta']) }}
@endsection

@section('description')
	{{ __('sold.seo-description') }}
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs pattern-bg">
		<div class="benu-container breadcrumbs__content flex justify-start">
			<a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('model-'.app()->getLocale()) }}">{{ __('breadcrumbs.models') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('model-'.app()->getLocale(), ['name' => strtolower($model_name)]) }}">{{ __('breadcrumbs.model') }} {{ ucwords($model_name) }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('sold-'.app()->getLocale(), ['name' => strtolower($model_name)]) }}" class="primary-color"><strong>{{ __('breadcrumbs.sold') }}</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
	<section class="sold">
		<div>
			<h1 class="sold__title">Découvrez les déclinaisons vendues du modèle {{ $model_name }}</h1>
		</div>
		<div>
			@livewire('filters.sold-articles-filter', ['filter_names' => $filter_names, 'initial_filters' => $initial_filters])

			<div class="pattern-bg">
				@livewire('filters.filtered-sold-articles', ['creation' => $model, 'initial_filters' => $initial_filters])
				<div class="sold__link text-center">
					<a href="{{ route('model-'.app()->getLocale(), ['name' => strtolower($model_name)]) }}" class="btn-slider-left m-auto block">
						Retour au modèle {{ strtoupper($model_name) }}
					</a>
				</div>
			</div>
		</div>
		@include('includes.model.model_request')
	</section>
@endsection

@section('scripts')
@endsection