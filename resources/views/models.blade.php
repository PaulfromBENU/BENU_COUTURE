@extends('layouts.base_layout')

@section('title')
	{{ __('models.seo-title-all') }}
@endsection

@section('description')
	{{ __('models.seo-description-all') }}
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs pattern-bg">
		<div class="benu-container breadcrumbs__content flex justify-start">
			<a href="{{ route('home', [app()->getLocale()]) }}">{{ __('breadcrumbs.home') }}</a>
			<div class="pl-5 pr-5">
				>
			</div>
			<a href="{{ route('model-'.app()->getLocale()) }}" class="primary-color"><strong>{{ __('breadcrumbs.models') }}</strong></a>
		</div>
	</div>
@endsection

@section('main-content')
	<section class="all-models">
		<div class="all-models__filters-container">
			<div class="all-models__filters flex justify-between benu-container">
				<div class="flex justify-start">
					<div class="all-models__filters__filter flex" id="filter-category">
						<p>Catégorie</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
					</div>
					<div class="all-models__filters__filter flex" id="filter-color">
						<p>Couleur</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
					</div>
					<div class="all-models__filters__filter flex" id="filter-gender">
						<p>Sexe</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
					</div>
					<div class="all-models__filters__filter flex" id="filter-price">
						<p>Prix</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
					</div>
					<div class="all-models__filters__filter flex" id="filter-partners">
						<p>Partenaires</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
					</div>
					<div class="all-models__filters__filter flex" id="filter-shops">
						<p>Points de vente</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
					</div>
				</div>

				<div class="all-models__filters__filter flex" style="margin-right: 5px;" id="filter-order">
					<p>Classer par</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
				</div>
			</div>

			@include('includes.model.model_filters')
		</div>

		<div class="all-models__active-filters flex justify-start benu-container">
			<div class="all-models__active-filters__filter flex justify-between">
				<div class="color-circle color-circle--green w-1/5"></div>
				<p class="w-3/5 pl-1">Vert</p>
				<div class="w-1/5">&#x2715;</div>
			</div>

			<div class="all-models__active-filters__filter flex justify-between">
				<div class="color-circle color-circle--red w-1/5"></div>
				<p class="w-3/5 pl-1">Rouge</p>
				<div class="w-1/5">&#x2715;</div>
			</div>

			<div class="all-models__active-filters__filter flex justify-between">
				<p class="w-4/5">Femme</p>
				<div class="w-1/5">&#x2715;</div>
			</div>

			<div class="all-models__active-filters__filter flex justify-between">
				<p class="w-4/5">Robe</p>
				<div class="w-1/5">&#x2715;</div>
			</div>
		</div>

		<div class="benu-container flex flex-wrap justify-between all-models__list">
			@for($j = 0; $j < $sections_number; $j++)
				@foreach($all_models[$j] as $model)
					@livewire('components.model-overview', ['model' => $model])
				@endforeach

				@if($j < $sections_number - 1)
					@switch($j)
						@case(0)
						<div class="all-models__list__separator all-models__list__separator--1">
						@break
						
						@case(1)
						<div class="all-models__list__separator all-models__list__separator--2">
						@break

						@default
						<div class="all-models__list__separator all-models__list__separator--1">
					@endswitch
						<p class="all-models__list__separator__title">
							@switch($j)
								@case(0)
								7000 à 10 000 litres d’eau
								@break
								
								@case(1)
								Pas la peine de les jeter
								@break

								@default
								7000 à 10 000 litres d’eau
							@endswitch
						</p>
						<p class="all-models__list__separator__subtitle">
							@switch($j)
								@case(0)
								C’est le nombre de litres d’eau nécessaires pour fabriquer un jeans.
								@break
								
								@case(1)
								Pas la peine de les jeter BENU COUTURE reprend tes vêtements pour des créations uniques.
								@break

								@default
								C’est le nombre de litres d’eau nécessaires pour fabriquer un jeans.
							@endswitch
						</p>
					</div>
				@endif
			@endfor
		</div>
	</section>
@endsection

@section('scripts')
<script type="text/javascript">
	$(function() {
		$('.all-models__filter-tag').on('click', function() {
			$(this).toggleClass('all-models__filter-tag--active');
		});
	})
</script>
@endsection