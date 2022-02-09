<section class="flex justify-between model-pres benu-container">
	<div class="model-pres__img-container">
		<img src="{{ asset('images/pictures/articles/modele_caretta_1.png') }}">
		<img src="{{ asset('images/pictures/articles/modele_2.png') }}" style="display: none;">
		<img src="{{ asset('images/pictures/articles/modele_3.png') }}" style="display: none;">
		<img src="{{ asset('images/pictures/articles/modele_4.png') }}" style="display: none;">
		<div class="slider-arrow slider-arrow--color-1 slider-arrow--left" id="model-picture-arrow-left">
			<i class="fas fa-chevron-left"></i>
		</div>
		<div class="slider-arrow slider-arrow--color-1 slider-arrow--right" id="model-picture-arrow-right">
			<i class="fas fa-chevron-right"></i>
		</div>
	</div>
	<div class="model-pres__desc">
		<h1 class="model-pres__desc__title">Modèle {{ strtoupper($model->name) }}</h1>
		<p class="model-pres__desc__txt">
			{{ $localized_description }}
		</p>
		<div class="flex justify-start model-pres__desc__keywords">
			<ul>
				@for($i = 0; $i < 4; $i++)
					@if(isset($keywords[$i]))
					<li>@svg('list_cintre') {{ $keywords[$i] }}</li>
					@endif
				@endfor
			</ul>
			
			@if(sizeof($keywords) > 4)
			<ul>
				@for($i = 4; $i < 8; $i++)
					@if(isset($keywords[$i]))
					<li>@svg('list_cintre') {{ $keywords[$i] }}</li>
					@endif
				@endfor
			</ul>
			@endif
		</div>
		<div class="model-pres__desc__link">
			<a href="{{ $model->origin_link }}" target="_blank" class="btn-slider-left">Toutes les origines du mot {{ strtoupper($model->name) }}</a>
		</div>
		<div class="flex model-pres__desc__seemore">
			<a href="#model-articles" class="flex">
				Découvre toutes les déclinaisons @svg('model_arrow_down')
			</a>
			
				<a class="flex">
					Découvre tous les accessoires @svg('model_arrow_down')
				</a>
			
		</div>
	</div>
</section>