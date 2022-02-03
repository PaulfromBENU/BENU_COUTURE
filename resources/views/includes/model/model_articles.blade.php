<section class="model-articles" id="model-articles">
	<h2>Les déclinaisons</h2>
	<!-- <div class="model-articles__filters flex">
		<div class="model-articles__filters__filter flex">
			<p>Taille</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
		</div>
		<div class="model-articles__filters__filter flex">
			<p>Couleur</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
		</div>
	</div> -->
	<div class="all-models__filters-container">
		<div class="all-models__filters flex justify-start benu-container">
			<div class="flex justify-start">
				<div class="all-models__filters__filter flex" id="filter-size">
					<p>Taille</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
				</div>
				<div class="all-models__filters__filter flex" id="filter-color">
					<p>Couleur</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
				</div>
				<div class="all-models__filters__filter flex" id="filter-shops">
					<p>Points de vente</p> <img src="{{ asset('images/pictures/chevron_bottom.png') }}">
				</div>
			</div>
		</div>

		@include('includes.model.article_filters')
	</div>

	<div class="model-articles__active-filters flex justify-start benu-container">
		<div class="model-articles__active-filters__filter flex justify-between">
			<div class="color-circle color-circle--green w-1/5"></div>
			<p class="w-3/5 pl-1">Vert</p>
			<div class="w-1/5">&#x2715;</div>
		</div>

		<div class="model-articles__active-filters__filter flex justify-between">
			<!-- <div class="w-1/4 mt-1"></div> -->
			<p class="w-4/5">XS</p>
			<div class="w-1/5">&#x2715;</div>
		</div>
	</div>

	<div class="model-articles__list flex flex-wrap justify-between benu-container">
		@for($i = 0; $i < 5; $i++)
			@include('includes.components.article_overview')
		@endfor
	</div>
</section>