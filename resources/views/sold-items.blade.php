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
			<a href="{{ route('model', ['locale' => app()->getLocale()]) }}">{{ __('breadcrumbs.models') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('model', ['locale' => app()->getLocale(), 'name' => 'caretta']) }}">{{ __('breadcrumbs.model') }} XXXX</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('sold') }}" class="primary-color"><strong>{{ __('breadcrumbs.sold') }}</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
	<section class="sold">
		<div>
			<h1 class="sold__title">Découvrez les déclinaisons vendues du modèle Caretta</h1>
		</div>
		<div class="">
			<div class="model-articles__filters flex benu-container">
				<div class="model-articles__filters__filter flex">
					<p>Taille</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
				</div>
				<div class="model-articles__filters__filter flex">
					<p>Couleur</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
				</div>
			</div>

			<div class="model-articles__active-filters flex justify-start benu-container">
				<div class="model-articles__active-filters__filter flex justify-between">
					<div class="color-circle color-circle--green w-1/5"></div>
					<p class="w-3/5 pl-1">Vert</p>
					<div class="w-1/5">&#x2715;</div>
				</div>

				<div class="model-articles__active-filters__filter flex justify-between">
					<!-- <div class="w-1/4 mt-1"></div> -->
					<p class="w-4/5">Taille XS</p>
					<div class="w-1/5">&#x2715;</div>
				</div>
			</div>

			<div class="pattern-bg">
				<div class="model-articles__list flex flex-wrap justify-between benu-container">
					@for($i = 0; $i < 12; $i++)
						@include('includes.components.sold_article_overview')
					@endfor
				</div>
				<div class="sold__link text-center">
					<a href="{{ route('model', ['locale' => app()->getLocale(), 'name' => 'caretta']) }}" class="btn-slider-left m-auto block">
						Retour au modèle Caretta
					</a>
				</div>
			</div>
		</div>
		@include('includes.model.model_request')
	</section>
@endsection

@section('scripts')
@endsection