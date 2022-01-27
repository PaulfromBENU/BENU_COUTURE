@extends('layouts.base_layout')

@section('title')
	{{ __('models.seo-title', ['name' => 'Caretta']) }}
@endsection

@section('description')
	{{ __('models.seo-description') }}
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs">
		<div class="benu-container breadcrumbs__content flex justify-start">
			<a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('contact') }}" class="primary-color"><strong>{{ __('breadcrumbs.model') }} XXXX</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
	<section class="flex justify-center model-pres">
		<div class="model-pres__img-container">
			
		</div>
		<div class="model-pres__desc">
			<h1 class="model-pres__desc__title">Modèle Caretta</h1>
			<p class="model-pres__desc__txt">
				Les blouses pour femme CARETTA de BENU COUTURE sont confectionnees a partir de ...
			</p>
			<div class="flex justify-start model-pres__desc__keywords">
				<ul>
					<li>Mot clé 1</li>
					<li>Mot clé 2</li>
					<li>Mot clé 3</li>
					<li>Mot clé 4</li>
				</ul>
				<ul>
					<li>Mot clé 5</li>
					<li>Mot clé 6</li>
					<li>Mot clé 7</li>
					<li>Mot clé 8</li>
				</ul>
			</div>
			<div class="model-pres__desc__link">
				<a href="#" class="btn-slider-left">Toutes les origines du mot CARETTA</a>
			</div>
			<div class="flex model-pres__desc__seemore">
				<a href="#model-articles">
					Découvre toutes les declinaisons ->
				</a>
				<a>
					Découvre tous les accessoires ->
				</a>
			</div>
		</div>
	</section>

	<section class="model-articles benu-container" id="model-articles">
		<h2>Les déclinaisons</h2>
		<div class="model-articles__filters flex benu-container">
			<div class="model-articles__filters__filter">
				Taille  <span class="primary-color"><i class="fas fa-angle-down"></i></span>
			</div>
			<div class="model-articles__filters__filter">
				Couleur  <span class="primary-color"><i class="fas fa-angle-down"></i></span>
			</div>
		</div>

		<div class="model-articles__active-filters benu-container flex justify-start">
			<div class="model-articles__active-filters__filter flex justify-between">
				<div class="color-circle color-circle--green w-1/4 mt-1"></div>
				<p class="w-1/2">Vert</p>
				<div class="w-1/4">&#x2715;</div>
			</div>

			<div class="model-articles__active-filters__filter flex justify-between">
				<!-- <div class="w-1/4 mt-1"></div> -->
				<p class="w-1/2">Taille XS</p>
				<div class="w-1/4">&#x2715;</div>
			</div>
		</div>
	</section>
@endsection

@section('scripts')

@endsection