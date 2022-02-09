<section class="flex justify-between model-pres benu-container">
	<div class="model-pres__img-container">
		@foreach($model_pictures as $picture)
            <img src="{{ asset('images/pictures/articles/'.$picture) }}" @if($loop->index > 0) style="display: none;" @endif>
        @endforeach
        @if($model_pictures->count() > 1)
            <div class="slider-arrow slider-arrow--color-2 slider-arrow--left article-arrow-left">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="slider-arrow slider-arrow--color-2 slider-arrow--right article-arrow-right">
                <i class="fas fa-chevron-right"></i>
            </div>
        @endif
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